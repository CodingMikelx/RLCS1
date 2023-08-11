<?php

namespace App\Repositories;

use App\Interfaces\CreatorRepositoryInterface;
use App\Models\Creator;

class CreatorRepository implements CreatorRepositoryInterface
{
    public function getAllCreator()
    {
        return Creator::all();
    }

    function getCreatorById($creatorId){
        return Creator::findOrFail($creatorId);
    }

    function deleteCreator($creatorId){
        Creator::destroy($creatorId);
    }
    
    function createCreator(array $creatorDetails){
        return Creator::create($creatorDetails);
    }

    function updateCreator($creatorId, array $newDetails){
        return Creator::whereId($creatorId)->update($newDetails);
    }

    // function getFulfilledCreator(){
    //     return Creator::where('is_fulfilled', true);
    // }
}
