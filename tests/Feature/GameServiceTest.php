<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Game;
use App\Models\Genre;

class GameServiceTest extends TestCase
{
    public function testGetAllGames()
    {
        $response = $this->getJson('/api/games');
        $response->assertStatus(200);
    }

    public function testGetGamesByGenre()
    {
        $genre = Genre::factory()->create();
        $response = $this->getJson("/api/games/genre/{$genre->id}");
        $response->assertStatus(200);
    }

    public function testCreateGame()
    {
        $genre = Genre::factory()->create();
        $response = $this->postJson('/api/games', [
            'title' => 'New Game',
            'developer' => 'Some Studio',
            'genres' => [$genre->id]
        ]);
        $response->assertStatus(201);
    }

    public function testUpdateGame()
    {
        $game = Game::factory()->create();
        $response = $this->putJson("/api/games/{$game->id}", [
            'title' => 'Updated Game'
        ]);
        $response->assertStatus(200);
    }

    public function testDeleteGame()
    {
        $game = Game::factory()->create();
        $response = $this->deleteJson("/api/games/{$game->id}");
        $response->assertStatus(204);
    }
}
