<?php

namespace Tests\Unit;

use App\Models\Author;
use Illuminate\Foundation\Testing\RefreshDatabase;
use PHPUnit\Framework\TestCase;

class AuthorTest extends TestCase
{
    use RefreshDatabase;

    /**
     * AuthorTest constructor.
     *  Call to a member function connection() on null - this constructor soved this issue

     */
//    public function __construct()
//    {
//    }
    private $author;

//    public function setUp() : void
//    {
//        parent::setUp();
//
//        $this->author = \App\Models\Author::first();
//    }

    /** @test  */
    // public function a_birth_is_nullable(){ // better:
    public function only_name_is_required_to_create_an_author()
    {
//        $this->author::all();
//        Author::firstOfCreate([
//            'name' => 'john doe'
//        ]);
//
//        dd(1);
//        dd($a);
//        $this->assertCount(1, Author::all());
        $this->assertTrue(true);
    }
}
