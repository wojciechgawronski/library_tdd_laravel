<?php declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BooksController extends Controller
{
    public function store() : void
    {
        $data = $this->validateRequest();

        // Book::create([
        //    'title' => \request('title'),
        //    'author' => \request('author')
        // ]);
        Book::create($data);
    }

    public function update(Book $book) : void
    {
        // $data = $this->validateRequest();
        // $book->update($data);
        // inline:
        $book->update($this->validateRequest());
    }

    /**
     * @return mixed
     */
    public function validateRequest(): mixed
    {
        return \request()->validate([
            'title' => 'required',
            'author' => 'required',
        ]);
    }
}
