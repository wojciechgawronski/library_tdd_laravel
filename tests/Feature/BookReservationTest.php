<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\App;
use Tests\TestCase;
use App\Models\Book;

class BookReservationTest extends TestCase
{
    use RefreshDatabase;
    /** @test */
    public function a_book_can_be_added_to_the_library()
    {

        // we sholud arround an error 404 and get proper PHP Error
        $this->withoutExceptionHandling();

        $response = $this->post('/books', [
            'title' => 'Some book title',
            'author' => 'woj'
        ]);

        $response->assertOk();
        $this->assertCount(1, Book::all());
    }

    /** @test */
    public function a_title_is_required()
    {
        // $this->withoutExceptionHandling();

        $response = $this->post('/books', [
            'title' => '',
            'author' => 'woj'
        ]);

        // Stwierdzenie, że sesja zawiera błędy
        $response->assertSessionHasErrors('title');
    }

    /** @test */
    public function a_author_is_required()
    {
        // $this->withoutExceptionHandling();

        $response = $this->post('/books', [
            'title' => 'some title',
            'author' => ''
        ]);

        $response->assertSessionHasErrors('author');
    }

    /** @test */
    public function a_book_can_be_updated()
    {
        $this->withoutExceptionHandling();

        $this->post('/books', [
            'title' => 'some title',
            'author' => 'woj'
        ]);

        $book = Book::first();

        $response = $this->patch('/books/' . $book->id, [
            'title' => 'new title',
            'author' => 'new author'
        ]);

        $this->assertEquals('new title', Book::first()->title);
        $this->assertEquals('new author', Book::first()->author);
    }
}
