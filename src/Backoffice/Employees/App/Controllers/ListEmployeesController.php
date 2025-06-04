<?php

declare(strict_types=1);

namespace Lightit\Backoffice\Employees\App\Controllers;

use Illuminate\Http\JsonResponse;
use Lightit\Backoffice\Employees\App\Transformers\EmployeeTransformer;
use Lightit\Backoffice\Employees\Domain\Actions\ListEmployeesAction;

final class ListEmployeesController
{
    public function __invoke(ListEmployeesAction $action): JsonResponse
    {
        $employees = $action->execute();

        return responder()
            ->success($employees, EmployeeTransformer::class)
            ->respond();
    }
}
