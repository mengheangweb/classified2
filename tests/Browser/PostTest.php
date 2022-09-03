<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use App\Models\User;
use App\Models\Post;

class PostTest extends DuskTestCase
{
    use DatabaseMigrations;
    
    /**
     * A Dusk test example.
     *
     * @return void
     */

    public function testListMyPost()
    {
        $user = User::factory()->create();
        $post = Post::factory()->create([
            'user_id' => $user->id
        ]);

        $this->browse(function (Browser $browser) use ($user, $post){
            $browser->loginAs($user)
                    ->visit('/my-post')
                    ->assertSee($post->title);
        });
    }
}
