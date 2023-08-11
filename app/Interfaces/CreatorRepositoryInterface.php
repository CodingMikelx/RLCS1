<?php

namespace App\Interfaces;

interface CreatorRepositoryInterface{
    public function getAllCreator();
    public function getCreatorById($creatorId);
    public function deleteCreator($creatorId);
    public function createCreator(array $creatorDetails);
    public function updateCreator($creatorId, array $newDetails);
    // public function getFulfilledCreator();
}