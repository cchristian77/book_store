<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use App\Repositories\Interfaces\UserInterface;
use App\Http\Validation\User\UpdateUserRequest as RequestValidation;

class UserController extends Controller
{

    private $repository;

    public function __construct(UserInterface $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Pagination\LengthAwarePaginator
     */
    public function index(Request $request)
    {
        $sortField = $request->query('sort_field');
        $sortOrder = $request->query('sort_order');

        $isPaginated = $request->query('paginated', 'true') === 'true';
        if ($isPaginated) {
            $perPage = $request->query('per_page', 20);
            return $this->repository->getAllPaginated($perPage, $sortField, $sortOrder);
        }

        return response()->json([
            'data' => $this->repository->getWithQuery($sortField, $sortOrder),
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Model
     */
    public function show($id)
    {
        return $this->repository->find($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param RequestValidation $request
     * @return mixed
     */
    public function update(RequestValidation $request)
    {
        return DB::transaction(function () use ($request) {
            $this->repository->update($request->all(), $request->id);
            $updatedData = $this->show($request->id);

            return response()->json([
                'message' => 'Update Success',
                'data' => $updatedData,
            ]);
        });
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function delete(Request $request)
    {
        return DB::transaction(function () use ($request) {
            $deletedData = $this->show($request->id);
            $this->repository->delete($request->id);

            return response()->json([
                'message' => 'Delete Success',
                'data' => $deletedData,
            ]);
        });
    }
}
