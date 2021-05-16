<?php declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BooksController extends Controller
{
    public function store()
    {
        $data = $this->validateRequest();

        // Book::create([
        //    'title' => \request('title'),
        //    'author' => \request('author')
        // ]);
        $book = Book::create($data);
        // return redirect('/books/' . $book->id);
        return redirect($book->path());
    }

    public function update(Book $book)
    {
        // $data = $this->validateRequest();
        // $book->update($data);
        // inline:
        $book->update($this->validateRequest());

        // return redirect('/books/' . $book->id);
        return redirect($book->path());
    }

    public function destroy(Book $book)
    {
        $book->delete();

        return redirect('/books');
    }

    /**
     * @return mixed
     */
    protected function validateRequest(): mixed
    {
        return \request()->validate([
            'title' => 'required',
            'author' => 'required',
        ]);
    }
}
