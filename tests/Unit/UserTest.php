<?php

namespace Tests\Unit;

use App\Models\Author;
use Illuminate\Foundation\Testing\RefreshDatabase;
use PHPUnit\Framework\TestCase;

class UserTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_example_user()
    {

//        dd(1);

//        Author::firstOfCreate([
//            'name' => 'john doe'
//        ]);

        $this->assertTrue(true);
    }
}
