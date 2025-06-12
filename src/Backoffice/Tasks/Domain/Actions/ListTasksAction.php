<?php

declare(strict_types=1);

namespace Lightit\Backoffice\Tasks\Domain\Actions;

use Illuminate\Database\Eloquent\Collection;
use Lightit\Backoffice\Tasks\Domain\Models\Task;
use Spatie\QueryBuilder\QueryBuilder;

final class ListTasksAction
{
    /**
     * @return Collection<int, Task>
     */
    public function execute(): Collection
    {
        /**
         * @var Collection<int, Task> $tasks
         */
        $tasks = QueryBuilder::for(Task::class)
            ->get();

        return $tasks;
    }
}
