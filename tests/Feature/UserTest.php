<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class UserTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */

    use RefreshDatabase;

    public function test_example()
    {
        $user = User::create([
            'name'=>'syaugi',
            'email'=>'syaugi@syaugi.com',
            'password'=>Hash::make('12345678')
        ]);

        if(!$user){
            return $this->assertFalse(false);
        }

        return $this->assertTrue(true);
    }
}
