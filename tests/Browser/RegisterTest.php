<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use App\Models\User;

class RegisterTest extends DuskTestCase
{
    use DatabaseMigrations;
    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function testShowRegisterForm()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/register')
                    ->assertSee('Register');
        });
    }

    public function testSubmitRegisterForm()
    {
        $user = User::factory()->make();

        $this->browse(function (Browser $browser) use ($user){
            $browser->visit('/register')
                    ->type('name', $user->name)
                    ->type('email', $user->email)
                    ->type('password', '12345678')
                    ->type('password_confirmation', '12345678')
                    ->press('Submit')
                    ->assertSee('Great, you have successfully created account.');
        });
    }
}
