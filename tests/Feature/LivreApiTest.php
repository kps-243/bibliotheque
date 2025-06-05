<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Livre;
use App\Models\Auteur;
use Carbon\Carbon;
class LivreApiTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    use RefreshDatabase;

    public function test_can_create_livre()
    {
        $auteur = Auteur::factory()->create();

        $data = [
            'titre' => 'Mon super livre',
            'prix' => 19.99,
            'date_publication' => '2023-04-01',
            'auteur_id' => $auteur->id,
        ];

        $response = $this->postJson('/api/livres', $data);

        $response->assertStatus(201)
                 ->assertJsonFragment([
                    'titre' => 'Mon super livre',
                    'prix' => 19.99,
                    'date_publication' => '2023-04-01',
                    'auteur_id' => $auteur->id,
                 ]);

        $this->assertDatabaseHas('livres', $data);
    }

    public function test_can_update_livre()
    {
        $auteur = Auteur::factory()->create();
        $livre = Livre::factory()->create(['auteur_id' => $auteur->id]);

        $updateData = [
            'titre' => 'Livre modifié',
            'prix' => 29.99,
            'date_publication' => '2023-05-01',
            'auteur_id' => $auteur->id,
        ];

        $response = $this->putJson("/api/livres/{$livre->id}", $updateData);

        $response->assertStatus(200)
                 ->assertJsonFragment($updateData);

        $this->assertDatabaseHas('livres', $updateData);
    }

    public function test_can_delete_livre()
    {
        $livre = Livre::factory()->create();

        $response = $this->deleteJson("/api/livres/{$livre->id}");

        $response->assertStatus(200)
                 ->assertJson(['message' => 'Livre supprimé']);

        $this->assertDatabaseMissing('livres', ['id' => $livre->id]);
    }

    public function test_can_get_livre()
    {
        $livre = Livre::factory()->create();
    
        $response = $this->getJson("/api/livres/{$livre->id}");
    
        $response->assertStatus(200)
                 ->assertJson([
                     'id' => $livre->id,
                     'titre' => $livre->titre,
                     'prix' => $livre->prix,
                     'date_publication' => Carbon::parse($livre->date_publication)->format('Y-m-d'),
                     'auteur_id' => $livre->auteur_id,
                 ]);
    }
}
