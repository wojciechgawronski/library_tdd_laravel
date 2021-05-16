<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class BookReservationTest extends TestCase
{

    /** @test */
    public function a_book_can_be_added_to_the_library(){

        // we sholud arround an error 404 and get proper PHP Error
        $this->withoutExceptionHandling();

        $response = $this->post('/books', [
            'title' => 'Some book title',
            'authot' => 'woj'
        ]);
        $response->assertOk();
        $this->assertCount(1, Book::all());
    }
}
