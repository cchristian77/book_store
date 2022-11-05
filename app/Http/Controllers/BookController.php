<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use App\Repositories\Interfaces\BookInterface;
use App\Http\Validation\Book\StoreBookRequest as RequestValidation;

class BookController extends Controller
{

    private $repository;
    private $relations; // Default Relations

    public function __construct(BookInterface $repository)
    {
        $this->repository = $repository;
        $this->relations = [
            'authors' => function ($query) {
                $query->select('name', 'nationality', 'about', 'profile_picture_url');
            },
            'genres' => function ($query) {
                $query->select('name');
            },
        ];
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Pagination\LengthAwarePaginator
     */
    public function index(Request $request)
    {
        $isPaginated = $request->query('paginated', 'true') === 'true';
        $sortField = $request->query('sort_field');
        $sortOrder = $request->query('sort_order');

        $relations = [
            'authors' => function ($query) {
                $query->select('name', 'nationality', 'about', 'profile_picture_url');
            },
            'genres' => function ($query) {
                $query->select('name');
            },
        ];

        if ($isPaginated) {
            $perPage = $request->query('per_page', 20);

            return $this->repository->getAllPaginated(
                $perPage,
                $sortField,
                $sortOrder,
                $this->relations
            );
        }

        return response()->json([
            'data' => $this->repository->getWithRelations($sortField, $sortOrder, $relations),
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
        return $this->repository->findWithRelations($id, $this->relations);
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
            $newData = $this->repository->storeBook($request);

            return response()->json([
                'message' => 'Store Success',
                'data' => $this->repository->findWithRelations($newData->id),
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
            $this->repository->updateBook($request);
            $updatedData = $this->repository->findWithRelations($request->id);

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
            $deletedData = $this->repository->findWithRelations($request->id);
            $this->repository->deleteBook($request->id);

            return response()->json([
                'message' => 'Delete Success',
                'data' => $deletedData,
            ]);
        });
    }
}
