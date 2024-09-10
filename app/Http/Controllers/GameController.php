<?php

namespace App\Http\Controllers;

use App\Http\Requests\GameRequest;
use App\Services\GameService;
use Illuminate\Http\Request;


class GameController extends Controller
{
    protected GameService $gameService;

    public function __construct(GameService $gameService)
    {
        $this->gameService = $gameService;
    }

    public function index()
    {
        return response()->json($this->gameService->getAllGames());
    }

    public function show($id)
    {
        return response()->json($this->gameService->getGameById($id));
    }

    public function store(GameRequest $request)
    {
        $game = $this->gameService->createGame($request->validated());
        return response()->json($game, 201);
    }
    public function update(GameRequest $request, $id)
    {
        $game = $this->gameService->updateGame($id, $request->validated());
        return response()->json($game);
    }

    public function destroy($id)
    {
        $messages = $this->gameService->deleteGame($id);
        // Если есть сообщения о жанрах без игр, возвращаем их
        if ($messages) {
            return response()->json(['messages' => $messages]);
        }
        return response()->json(null, 204);
    }

    public function getByGenre($genreId)
    {
        return response()->json($this->gameService->getGamesByGenre($genreId));
    }
}
