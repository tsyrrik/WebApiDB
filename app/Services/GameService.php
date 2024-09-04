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

    public function deleteGame($id)
    {
        return $this->gameRepository->delete($id);
    }

    public function getGamesByGenre($genreId)
    {
        return $this->gameRepository->findByGenre($genreId);
    }
}
