<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Cauldron\Brewpile;
use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class BrewpileTest extends TestCase
{
    use RefreshDatabase; 

    /** @test */
    public function a_brewpile_can_be_added_to_cauldron()
    {
        $response = $this->post('/brewpiles', [
            'name' => 'Cauldron1',
        ]);

        
        
        $response->assertStatus(200);
        $response->assertOK();
        $this->assertCount(1, Brewpile::all());

        if(DB::connection()) {
            $titles = DB::table('brewpiles')->pluck('name');

            foreach ($titles as $title) {
                echo $title;
            }
            
            dump(DB::getDatabaseName());
        }
    }
}
