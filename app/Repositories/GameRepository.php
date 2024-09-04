<?php

namespace App\Repositories;

use App\Models\Game;

class GameRepository implements GameRepositoryInterface
{
    public function getAll()
    {
        // Получение всех игр из базы данных
        return Game::all();
    }

    public function findById($id)
    {
        return Game::findOrFail($id);
    }

    public function create(array $data)
    {
        return Game::create($data);
    }

    public function update($id, array $data)
    {
        $game = Game::findOrFail($id);
        $game->update($data);
        return $game;
    }

    public function delete($id)
    {
        $game = Game::findOrFail($id);
        $game->delete();
    }

    public function findByGenre($genreId)
    {
        return Game::whereHas('genres', function ($query) use ($genreId) {
            $query->where('id', $genreId);
        })->get();
    }
}
