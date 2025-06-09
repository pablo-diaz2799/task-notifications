<?php

declare(strict_types=1);

namespace Lightit\Backoffice\Employees\App\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Lightit\Backoffice\Employees\Domain\Models\Employee;

/**
 * @mixin Employee
 */
class EmployeeResource extends JsonResource
{
    /**
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name'=> $this->name,
            'email'=> $this->email,
        ];
    }
}
