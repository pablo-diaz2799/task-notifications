<?php

declare(strict_types=1);

namespace Lightit\Backoffice\Tasks\App\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Lightit\Backoffice\Tasks\Domain\Models\Task;

/**
 * @mixin Task
 */
class TaskResource extends JsonResource
{
    /**
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'description' => $this->description,
            'status' => $this->status,
            'employee_id' => $this->employee_id,
        ];
    }
}
