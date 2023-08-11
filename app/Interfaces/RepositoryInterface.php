<?php

namespace App\Interfaces;

interface RepositoryInterface{
    public function getAllObject();
    public function getObjectById($objectId);
    public function deleteObject($objectId);
    public function createObject(array $objectDetails);
    public function updateObject($objectId, array $objectDetails);
    // public function getFulfilledObject();
}