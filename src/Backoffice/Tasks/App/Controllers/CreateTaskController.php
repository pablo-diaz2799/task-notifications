<?php

declare(strict_types=1);

namespace Lightit\Backoffice\Tasks\App\Controllers;

use Illuminate\Http\JsonResponse;
use Lightit\Backoffice\Tasks\App\Requests\CreateTaskRequest;
use Lightit\Backoffice\Tasks\App\Resources\TaskResource;
use Lightit\Backoffice\Tasks\Domain\Actions\CreateTaskAction;

final class CreateTaskController
{
    public function __invoke(CreateTaskRequest $request, CreateTaskAction $action): JsonResponse
    {
        $task = $action->execute($request->toDto());

        return TaskResource::make($task->toArray())->response();
    }
}
