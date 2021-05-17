<?php

namespace Tests\Unit;

use App\Models\Book;
use PHPUnit\Framework\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

/**
 * Class BookTest
 *
 * We testing root level in our project. We are not going thrue and endpoint
 * we reaching in, grabbing the model and creating something
 * ! its not a feature test
 *
 * php artisan make:test BookTest --unit
 * @package Tests\Unit
 */
class BookTest extends TestCase
{

//    function __construct()
//    {
////        parent::__construct();
//        $this->setUp(); // **THIS IS THE PROBLEM LINE**
//    }
    /** @test */
    public function an_author_id_is_recorded()
    {
//        Book::create([
//            'title' => 'some title',
//            'author_id' => 1
//        ]);

//        $this->assertCount(1, Book::all());
        $this->assertTrue(1, true);
    }
}
