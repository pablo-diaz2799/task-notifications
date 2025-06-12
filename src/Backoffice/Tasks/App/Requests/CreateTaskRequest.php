<?php

declare(strict_types=1);

namespace Lightit\Backoffice\Tasks\App\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Lightit\Backoffice\Tasks\Domain\Dto\TaskDto;

final class CreateTaskRequest extends FormRequest
{
    public const string TITLE = 'title';

    public const string DESCRIPTION = 'description';

    public const string STATUS = 'status';

    public const string EMPLOYEE_ID = 'employee_id';

    public function rules(): array
    {
        return [
            self::TITLE => ['required', 'string'],
            self::DESCRIPTION => ['required', 'string'],
            self::STATUS => ['required', 'string'],
            self::EMPLOYEE_ID => ['required', 'integer', Rule::exists('employees', 'id')],
        ];
    }

    public function toDto(): TaskDto
    {
        return new TaskDto(
            title: $this->string(self::TITLE)->toString(),
            description: $this->string(self::DESCRIPTION)->toString(),
            status: $this->string(self::STATUS)->toString(),
            employee_id: $this->integer(self::EMPLOYEE_ID),
        );
    }
}
