<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use App\Repositories\Interfaces\GenreInterface;
use App\Http\Validation\Genre\StoreGenreRequest as RequestValidation;

class GenreController extends Controller
{

    private $repository;

    public function __construct(GenreInterface $repository)
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
        $isPaginated = $request->query('paginated', true) === 'true';
        if ($isPaginated) {
            $sortField = $request->query('sort_field');
            $sortOrder = $request->query('sort_order');
            $perPage = $request->query('per_page', 20);

            return $this->repository->getAllPaginated($perPage, $sortField, $sortOrder);
        }

        return response()->json([
            'data' => $this->repository->all(),
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
     * Store a newly created resource in storage.
     *
     * @param RequestValidation $request
     * @return Response
     */
    public function store(RequestValidation $request)
    {
        return DB::transaction(function () use ($request) {
            $newData = $this->repository->create($request->all());

            return response()->json([
                'message' => 'Store Success',
                'data' => $newData,
            ], 201);
        });
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
