<?php

declare(strict_types=1);

namespace Lightit\Backoffice\Employees\App\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Lightit\Backoffice\Employees\Domain\Dto\EmployeeDto;

final class CreateEmployeeRequest extends FormRequest
{
    public const string NAME = 'name';

    public const string EMAIL = 'email';

    public function rules(): array
    {
        return [
            self::NAME => ['required', 'string'],
            self::EMAIL => ['required', 'email', Rule::unique('employees')],
        ];
    }

    public function toDto(): EmployeeDto
    {
        return new EmployeeDto(
            name: $this->string(self::NAME)->toString(),
            email: $this->string(self::EMAIL)->toString(),
        );
    }
}
