<?php

declare(strict_types=1);

namespace Lightit\Backoffice\Employees\Domain\Actions;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Lightit\Backoffice\Employees\Domain\Models\Employee;
use Spatie\QueryBuilder\QueryBuilder;

final class ListEmployeesAction
{
    /**
     * @return Collection<int, Model>
     */
    public function execute(): Collection
    {
        return QueryBuilder::for(Employee::class)
            ->allowedFilters(['name', 'email'])
            ->allowedSorts(['name', 'email'])
            ->get();
    }
}
