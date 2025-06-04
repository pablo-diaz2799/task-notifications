<?php

declare(strict_types=1);

namespace Lightit\Backoffice\Employees\Domain\Actions;

use Lightit\Backoffice\Employees\Domain\Dto\EmployeeDto;
use Lightit\Backoffice\Employees\Domain\Models\Employee;

final class CreateEmployeeAction
{
    public function execute(EmployeeDto $dto): Employee
    {
        return Employee::create([
            'name' => $dto->name,
            'email' => $dto->email,
        ]);
    }
}
