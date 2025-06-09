<?php

declare(strict_types=1);

namespace Lightit\Backoffice\Tasks\App\Controllers;

use Illuminate\Http\JsonResponse;
use Lightit\Backoffice\Tasks\App\Requests\UpsertTaskRequest;
use Lightit\Backoffice\Tasks\App\Resources\TaskResource;
use Lightit\Backoffice\Tasks\Domain\Actions\UpsertTaskAction;

final class UpsertTaskController
{
    public function __invoke(UpsertTaskRequest $request, UpsertTaskAction $action): JsonResponse
    {
        $task = $action->execute($request->toDto());

        return TaskResource::make($task)->response();
    }
}
