<?php

namespace Tests\Unit;

use App\User;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class UserTest extends TestCase
{
    use DatabaseTransactions;
    
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testExample()
    {
        $this->assertTrue(true);
        
        /* Given we have 5 users */
        $user1 = factory(User::class)->create();        
        $user2 = factory(User::class)->create();
        $user3 = factory(User::class)->create();
        $user4 = factory(User::class)->create();
        $user5 = factory(User::class)->create();
        
        /* When we load all users */
        $users = User::all();
        
        /* Then we should have this 2 users */
        $this->assertCount(5, $users);
        
        /* Assert that we have no posts for any of the users */
        $this->assertCount(0, $user1->posts);
        $this->assertCount(0, $user2->posts);
        $this->assertCount(0, $user3->posts);
        $this->assertCount(0, $user4->posts);
        $this->assertCount(0, $user5->posts);
        
    }
}
