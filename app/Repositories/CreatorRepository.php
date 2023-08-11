<?php

namespace App\Repositories;

use App\Interfaces\RepositoryInterface;
use App\Models\Creator;

class CreatorRepository implements RepositoryInterface
{
    public function getAllObject()
    {
        return Creator::all();
    }

    function getObjectById($objectId){
        return Creator::findOrFail($objectId);
    }

    function deleteObject($objectId){
        Creator::destroy($objectId);
    }
    
    function createObject(array $objectDetails){
        return Creator::create($objectDetails);
    }

    function updateObject($objectId, array $newDetails){
        return Creator::whereId($objectId)->update($newDetails);
    }

    // function getFulfilledObject(){
    //     return Creator::where('is_fulfilled', true);
    // }
}
