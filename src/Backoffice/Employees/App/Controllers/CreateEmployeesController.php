<?php

declare(strict_types=1);

namespace Lightit\Backoffice\Employees\App\Controllers;

use Illuminate\Http\JsonResponse;
use Lightit\Backoffice\Employees\App\Requests\CreateEmployeeRequest;
use Lightit\Backoffice\Employees\App\Transformers\EmployeeTransformer;
use Lightit\Backoffice\Employees\Domain\Actions\CreateEmployeeAction;

final class CreateEmployeesController
{
    public function __invoke(CreateEmployeeRequest $request, CreateEmployeeAction $action): JsonResponse
    {
        $employee = $action->execute($request->toDto());

        return responder()
            ->success($employee, EmployeeTransformer::class)
            ->respond();
    }
}
