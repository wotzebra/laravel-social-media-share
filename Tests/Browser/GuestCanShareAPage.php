<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;

class GuestCanShareAPageTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @test
     * @throws \Throwable
     */
    public function guestCanShareAPage()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/');
            // Write test
        });
    }
}
