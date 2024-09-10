<?php

namespace App\Services;

use App\Repositories\GameRepositoryInterface;

class GameService
{
    protected GameRepositoryInterface $gameRepository;

    public function __construct(GameRepositoryInterface $gameRepository)
    {
        $this->gameRepository = $gameRepository;
    }

    public function getAllGames()
    {
        return $this->gameRepository->getAll();
    }

    public function getGameById($id)
    {
        return $this->gameRepository->findById($id);
    }

    public function createGame($data)
    {
        return $this->gameRepository->create($data);
    }

    public function updateGame($id, $data)
    {
        return $this->gameRepository->update($id, $data);
    }

    public function getGamesByGenre($genreId)
    {
        return $this->gameRepository->findByGenre($genreId);
    }
    public function deleteGame($id)
    {
        $game = $this->gameRepository->findById($id);

        if ($game) {
            $genres = $game->genres;

            $this->gameRepository->delete($id);

            // Сообщения для жанров, у которых больше нет игр
            $messages = [];

            // Проверяем каждый жанр, остались ли игры у жанра
            foreach ($genres as $genre) {
                $remainingGames = $this->gameRepository->findByGenre($genre->id);

                if ($remainingGames->isEmpty()) {
                    $messages[] = "У жанра {$genre->name} больше нет игр в базе";
                }
            }
            return $messages ?: null;
        }
        return null;
    }
}
