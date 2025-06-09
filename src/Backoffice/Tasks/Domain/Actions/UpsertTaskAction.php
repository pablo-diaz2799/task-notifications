<?php

declare(strict_types=1);

namespace Lightit\Backoffice\Tasks\Domain\Actions;

use Lightit\Backoffice\Tasks\Domain\Dto\TaskDto;
use Lightit\Backoffice\Tasks\Domain\Models\Task;
use Lightit\Shared\App\Notifications\TaskAssigned;

final class UpsertTaskAction
{
    public function execute(TaskDto $dto): Task
    {
        $task = $dto->id !== null
            ? Task::findOrNew($dto->id)
            : new Task();

        $task->fill([
            'title' => $dto->title,
            'description' => $dto->description,
            'status' => $dto->status,
            'employee_id' => $dto->employee_id,
        ]);

        $task->save();

        if (($task->wasRecentlyCreated || $task->wasChanged('employee_id')) && $task->employee !== null) {
            $task->employee->notify(new TaskAssigned($task));
        }

        return $task;
    }
}
