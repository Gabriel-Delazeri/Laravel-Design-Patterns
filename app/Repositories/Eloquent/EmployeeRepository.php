<?php

namespace App\Repositories\Eloquent;

use App\Models\Employee;
use App\Repositories\Contracts\EmployeeRepositoryInterface;

class EmployeeRepository extends AbstractRepository implements EmployeeRepositoryInterface
{
    protected $model = Employee::class;
}
