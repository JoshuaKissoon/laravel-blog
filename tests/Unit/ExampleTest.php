<?php

namespace Tests\Unit;

use App\Post;
use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ExampleTest extends TestCase
{
    use DatabaseTransactions;
    
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testBasicTest()
    {
        // Given we have 2 posts
        $first = factory(Post::class)->create();
        $second = factory(Post::class)->create([
            'created_at' => \Carbon\Carbon::now()->subMonth()
        ]);
        
        // When we load the archives
        $archives = Post::archives();
        
        // Then we should have this result
        $this->assertCount(2, $archives);
        $this->assertEquals($archives, [
            [
                "year" => $first->created_at->format("Y"), 
                "month" => $first->created_at->format("F"), 
                "published" => 1
            ], 
            [
                "year" => $second->created_at->format("Y"), 
                "month" => $second->created_at->format("F"), 
                "published" => 1
            ]
        ]);
    }
}
