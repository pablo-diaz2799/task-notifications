<?php

declare(strict_types=1);

namespace Lightit\Backoffice\Tasks\Domain\Dto;

final class TaskDto
{
    public function __construct(
        public string $title,
        public string $description,
        public string $status,
        public int $employee_id,
        public int|null $id = null,
    ) {
    }
}
