<?php

namespace MyApp\ReadingCircles\Infrastructure\DAOs;

use Illuminate\Database\Eloquent\Model;

class BookDAO extends Model
{
    protected $primaryKey = 'book_id';
    protected $table = 'books';
    protected $guarded = [
        'book_id',
    ];

    public function findById(int $id)
    {
        return $this->where('book_id', $id)->first();
    }

    public function findByIsbn(string $isbn)
    {
        return $this->where('isbn', $isbn)->first();
    }

    public function findAllBy(int $offset = 0, int $limit = PHP_INT_MAX)
    {
        return \DB::table($this->table)
                ->offset($offset)
                ->limit($limit)
                ->get();
    }
}
