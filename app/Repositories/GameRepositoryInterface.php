<?php

namespace App\Repositories;

interface GameRepositoryInterface
{
    public function getAll();
    public function findById($id);
    public function create(array $data);
    public function update($id, array $data);
    public function delete($id);
    public function findByGenre($genreId);
}
