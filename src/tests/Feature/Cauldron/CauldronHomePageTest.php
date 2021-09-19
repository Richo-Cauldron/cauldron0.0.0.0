<?php

namespace Tests\Feature\Cauldron;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CauldronHomePageTest extends TestCase
{
   /** @test */
   public function home_page_contains_cauldronhomepage_lw_component()
   {
       $this->get('/')->assertSeeLivewire('cauldron.home.cauldron-home-page');
   }
}
