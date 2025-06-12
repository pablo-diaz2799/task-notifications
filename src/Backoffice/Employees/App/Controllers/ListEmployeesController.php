<?php

declare(strict_types=1);

namespace Lightit\Backoffice\Employees\App\Controllers;

use Illuminate\Http\JsonResponse;
use Lightit\Backoffice\Employees\App\Resources\EmployeeResource;
use Lightit\Backoffice\Employees\Domain\Actions\ListEmployeesAction;

final class ListEmployeesController
{
    public function __invoke(ListEmployeesAction $action): JsonResponse
    {
        $employees = $action->execute();

        return EmployeeResource::collection($employees)->response();
    }
}
