<?php

namespace Tests\Feature;

use App\Models\Book;
use Carbon\Carbon;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Author;

class AuthorManagmentTest extends TestCase
{
    // It is often useful to reset your database after each test so that data from a previous test does not interfere with subsequent tests.
    // It takes the most optimal approach to migrating your test database depending on if you are using an in-memory database or a traditional database.
    // Use the trait on your test class and everything will be handled for you:
    use RefreshDatabase;

    /** @test  */
    public function an_author_can_be_created()
    {
        // $this->withoutExceptionHandling();

        $this->post('/author', [
            'name' => 'author name',
            'birth' => '05/11/1986',
        ]);

        $author = Author::all();

        $this->assertCount(1, $author);
        // Carbon - A simple PHP API extension for DateTime.
        $this->assertInstanceOf(Carbon::class, $author->first()->birth);
        // for confirm to correct date format:
        $this->assertEquals('1986/11/05', $author->first()->birth->format('Y/d/m'));
    }

    /**
     * @test
     * Our databsae is clean before every test. Just remind.
     */
    public function a_new_author_is_automatically_added()
    {
        $this->withoutExceptionHandling();

        $this->post('/author', [
            'name' => 'author name',
            'birth' => '05/11/1986',
        ]);

        $book = Book::first();
        $author = Author::first();

        $this->assertEquals($author->id, $book->book_id);
        $this->assertCount(1, Author::all());
    }
}
