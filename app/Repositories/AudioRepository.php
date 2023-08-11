<?php

namespace App\Repositories;

use App\Interfaces\RepositoryInterface;
use App\Models\Audio;


class AudioRepository implements RepositoryInterface{
    public function getAllObject()
    {
        return Audio::all();
    }

    function getObjectById($objectId)
    {
        return Audio::findOrFail($objectId);
    }

    function deleteObject($objectId){
        Audio::destroy($objectId);
    }

    function createObject(array $objectDetails)
    {
        return Audio::create($objectDetails);
    }

    function updateObject($objectId, array $newDetails)
    {
        return Audio::whereId($objectId)->update($newDetails);
    }
}