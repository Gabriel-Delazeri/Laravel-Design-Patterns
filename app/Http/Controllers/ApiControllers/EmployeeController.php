<?php

namespace App\Http\Controllers\ApiControllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreEmployeeRequest;
use App\Http\Requests\UpdateEmployeeRequest;
use App\Repositories\Contracts\EmployeeRepositoryInterface;

class EmployeeController extends Controller
{
    private EmployeeRepositoryInterface $employeeRepository;

    public function __construct(EmployeeRepositoryInterface $employeeRepository)
    {
        $this->employeeRepository = $employeeRepository;
    }

    public function store(StoreEmployeeRequest $request)
    {
        $this->employeeRepository->create($request->all());

        return response()->json(200);
    }

    public function show($id)
    {
        return response()->json([
            'data' => $this->employeeRepository->getById($id),
        ], 200);
    }

    public function update(UpdateEmployeeRequest $request, $id)
    {
        $this->employeeRepository->update($id, $request->all());

        return response()->json(200);
    }

    public function destroy($id)
    {
        $this->employeeRepository->delete($id);

        return response()->json(200);
    }
}
