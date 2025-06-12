<?php

declare(strict_types=1);

namespace Lightit\Backoffice\Tasks\App\Controllers;

use Illuminate\Http\JsonResponse;
use Lightit\Backoffice\Tasks\App\Resources\TaskResource;
use Lightit\Backoffice\Tasks\Domain\Models\Task;

final class FindTaskController
{
    public function __invoke(Task $task): JsonResponse
    {
        return TaskResource::make($task)->response();
    }
}
