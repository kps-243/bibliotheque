<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use App\Models\Auteur;
use Tests\TestCase;

class AuteurApiTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    use RefreshDatabase; // Reset DB à chaque test

    public function test_can_create_auteur()
    {
        $data = [
            'nom' => 'Dupont',
            'prenom' => 'Jean',
        ];

        $response = $this->postJson('/api/auteurs', $data);

        $response->assertStatus(201)
                 ->assertJsonFragment($data);

        $this->assertDatabaseHas('auteurs', $data);
    }

    public function test_can_update_auteur()
    {
        $auteur = Auteur::factory()->create();

        $updateData = [
            'nom' => 'UpdatedNom',
            'prenom' => 'UpdatedPrenom',
        ];

        $response = $this->putJson("/api/auteurs/{$auteur->id}", $updateData);

        $response->assertStatus(200)
                 ->assertJsonFragment($updateData);

        $this->assertDatabaseHas('auteurs', $updateData);
    }

    public function test_can_delete_auteur()
    {
        $auteur = Auteur::factory()->create();

        $response = $this->deleteJson("/api/auteurs/{$auteur->id}");

        $response->assertStatus(200)
                 ->assertJson(['message' => 'Auteur supprimé']);

        $this->assertDatabaseMissing('auteurs', ['id' => $auteur->id]);
    }

    public function test_can_get_auteur()
    {
        $auteur = Auteur::factory()->create();

        $response = $this->getJson("/api/auteurs/{$auteur->id}");

        $response->assertStatus(200)
                 ->assertJson([
                     'id' => $auteur->id,
                     'nom' => $auteur->nom,
                     'prenom' => $auteur->prenom,
                 ]);
    }
}
