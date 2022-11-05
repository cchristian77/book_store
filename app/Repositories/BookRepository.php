<?php

namespace App\Repositories;

use App\Models\Book;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use App\Repositories\Interfaces\BookInterface;
use Illuminate\Pagination\LengthAwarePaginator;

class BookRepository extends BaseRepository implements BookInterface
{
    public function __construct(Book $model)
    {
        parent::__construct($model);
    }

    public function queryWithRelations($relations): Builder
    {
        return $this->model
            ->with($relations);
    }

    public function getAllPaginated(
        $perPage,
        $sortField,
        $sortOrder,
        $relations = ['authors', 'genres']): LengthAwarePaginator
    {
        $fillable = 'id';
        $sortOrder = $sortOrder ?? 'asc';

        if ($sortField) {
            foreach ($this->model->getFillable() as $fill) {
                if ($sortField === $fill) {
                    $fillable = $sortField;
                    break;
                }
            }
        }

        return $this->queryWithRelations($relations)
            ->orderBy($fillable, $sortOrder)
            ->paginate($perPage);
    }

    public function getWithRelations($sortField, $sortOrder, $relations = ['authors', 'genres']): Collection
    {
        $fillable = 'id';
        $sortOrder = $sortOrder ?? 'asc';

        return $this->queryWithRelations($relations)
            ->orderBy($fillable, $sortOrder)
            ->get();
    }

    public function findWithRelations($id, $relations = ['authors', 'genres']): Model
    {
        return $this
            ->queryWithRelations($relations)
            ->findOrFail($id);
    }

    public function storeBook($request): Model
    {
        $book = $this->create($request->except('authors', 'genres'));
        $this->syncBookData($request, $book);
        return $book;
    }

    public function updateBook($request): void
    {
        $this->update($request->except('authors', 'genres'), $request->id);

        $book = $this->find($request->id);
        $this->syncBookData($request, $book);
    }

    public function deleteBook($id)
    {
        $book = $this->find($id);
        $book->authors()->detach();
        $book->genres()->detach();
        return $this->delete($id);
    }

    private function syncBookData($request, Book $model)
    {
        $arrAuthors = array();
        $requestAuthors = $request->get('authors');
        foreach ($requestAuthors as $requestAuthor) {
            array_push($arrAuthors, $requestAuthor['id']);
        }
        $model->authors()->sync($arrAuthors);

        $arrGenres = array();
        $requestGenres = $request->get('genres');
        foreach ($requestGenres as $requestGenre) {
            array_push($arrGenres, $requestGenre['id']);
        }
        $model->genres()->sync($arrGenres);
    }
}
