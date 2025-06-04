<?php

declare(strict_types=1);

namespace Lightit\Backoffice\Tasks\App\Controllers;

use Illuminate\Http\JsonResponse;
use Lightit\Backoffice\Tasks\App\Requests\UpsertTaskRequest;
use Lightit\Backoffice\Tasks\App\Transformers\TaskTransformer;
use Lightit\Backoffice\Tasks\Domain\Actions\UpsertTaskAction;
use Lightit\Shared\App\Notifications\TaskAssigned;

final class UpsertTaskController
{
    public function __invoke(UpsertTaskRequest $request, UpsertTaskAction $action): JsonResponse
    {
        $task = $action->execute($request->toDto());

        if ($task->employee) {
            $task->employee->notify(new TaskAssigned($task));
        }

        return responder()->success($task, TaskTransformer::class)->respond();
    }
}
