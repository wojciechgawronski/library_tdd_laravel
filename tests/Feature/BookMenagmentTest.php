<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\App;
use Tests\TestCase;
use App\Models\Book;

class BookMenagmentTest extends TestCase
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

        $book = Book::first();

        // $response->assertOk();
        $this->assertCount(1, Book::all());
        // $response->assertRedirect('/books/' . $book->id);
        $response->assertRedirect($book->path());
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

        // $response = $this->patch('/books/' . $book->id, [
        $response = $this->patch($book->path(), [
            'title' => 'new title',
            'author' => 'new author'
        ]);

        $this->assertEquals('new title', Book::first()->title);
        $this->assertEquals('new author', Book::first()->author);
        // $response->assertRedirect('/books/' . $book->id);
        $response->assertRedirect($book->fresh()->path());
    }

    /** @test  */
    public function a_book_can_be_deleted()
    {
        $this->withoutExceptionHandling();

        $this->post('/books', [
            'title' => 'some title',
            'author' => 'woj'
        ]);

        $book = Book::first();

        $this->assertCount(1, Book::all());

        $response = $this->delete('/books/'.$book->id);

        $this->assertCount(0, Book::all());

        $response->assertRedirect('/books');
    }
}
