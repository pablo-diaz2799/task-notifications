<?php

declare(strict_types=1);

namespace Lightit\Backoffice\Employees\Domain\Dto;

final class EmployeeDto
{
    public function __construct(
        public string $name,
        public string $email,
    ) {
    }
}
