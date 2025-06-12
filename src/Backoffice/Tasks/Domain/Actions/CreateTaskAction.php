<?php

declare(strict_types=1);

namespace Lightit\Backoffice\Tasks\Domain\Actions;

use Lightit\Backoffice\Tasks\Domain\Dto\TaskDto;
use Lightit\Backoffice\Tasks\Domain\Models\Task;
use Lightit\Shared\App\Notifications\TaskAssigned;

final class CreateTaskAction
{
    public function execute(TaskDto $dto): Task
    {
        $task = Task::create([
            'title' => $dto->title,
            'description' => $dto->description,
            'status' => $dto->status,
            'employee_id' => $dto->employee_id,
        ]);

        $this->notifyEmployee($task);

        return $task;
    }

    private function notifyEmployee(Task $task): void
    {
        if ($task->employee !== null) {
            $task->employee->notify(new TaskAssigned($task));
        }
    }
}
