<?php

declare(strict_types=1);

namespace Lightit\Backoffice\Tasks\Domain\Actions;

use Lightit\Backoffice\Tasks\Domain\Dto\TaskDto;
use Lightit\Backoffice\Tasks\Domain\Models\Task;
use Lightit\Shared\App\Notifications\TaskAssigned;

final class UpdateTaskAction
{
    public function execute(Task $task, TaskDto $dto): Task
    {
        $task->fill([
            'title' => $dto->title,
            'description' => $dto->description,
            'status' => $dto->status,
            'employee_id' => $dto->employee_id,
        ]);

        $task->save();

        if ($task->wasChanged('employee_id')) {
            $this->notfiyEmployee($task);
        }

        return $task;
    }

    private function notfiyEmployee(Task $task): void
    {
        if ($task->employee !== null) {
            $task->employee->notify(new TaskAssigned($task));
        }
    }
}
