<?php

declare(strict_types=1);

namespace Lightit\Backoffice\Tasks\App\Controllers;

use Illuminate\Http\JsonResponse;
use Lightit\Backoffice\Tasks\App\Requests\UpdateTaskRequest;
use Lightit\Backoffice\Tasks\App\Resources\TaskResource;
use Lightit\Backoffice\Tasks\Domain\Actions\UpdateTaskAction;
use Lightit\Backoffice\Tasks\Domain\Models\Task;

final class UpdateTaskController
{
    public function __invoke(Task $task, UpdateTaskRequest $request, UpdateTaskAction $action): JsonResponse
    {
        $task = $action->execute($task, $request->toDto());

        return TaskResource::make($task)->response();
    }
}
