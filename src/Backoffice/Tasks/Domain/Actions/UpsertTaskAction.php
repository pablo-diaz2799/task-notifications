<?php

declare(strict_types=1);

namespace Lightit\Backoffice\Tasks\Domain\Actions;

use Lightit\Backoffice\Tasks\Domain\Dto\TaskDto;
use Lightit\Backoffice\Tasks\Domain\Models\Task;

final class UpsertTaskAction
{
    public function execute(TaskDto $dto): Task
    {
        return Task::updateOrCreate(
            [
                'id' => $dto->id,
            ],
            [
                'title' => $dto->title,
                'description' => $dto->description,
                'status' => $dto->status,
                'employee_id' => $dto->employee_id,

            ],
        );
    }
}
