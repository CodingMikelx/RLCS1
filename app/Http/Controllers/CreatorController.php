<?php

namespace App\Http\Controllers;

use App\Interfaces\RepositoryInterface;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Requests\CreatorRequest;


class CreatorController extends Controller
{
    //
    private RepositoryInterface $creatorRepository;
    public function __construct(RepositoryInterface $creatorRepository)
    {
        $this->creatorRepository = $creatorRepository;
    }
    
    public function index(): JsonResponse
    {
        return response()->json([
            'data' => $this->creatorRepository->getAllObject()
        ]);
    }

    public function store(CreatorRequest $request): JsonResponse
    {
        // variable which is created in interface also be used 
        $objectDetails = $request->only([
            'name',
            'role',
        ]);
        
        // using method of creatorRepository which is called from Model's method
        return response()->json(
            [
                'data' => $this->creatorRepository->createObject($objectDetails)
            ],
            Response::HTTP_CREATED
        );
    }

    public function show(Request $request): JsonResponse
    {
        $objectId = $request->route('id'); // take id from api.php route

        return response()->json([
            'data' => $this->creatorRepository->getObjectById($objectId)
        ]);
    }

    public function update(CreatorRequest $request): JsonResponse
    {
        $objectId = $request->route('id');
        $objectDetails = $request->only([
            'name',
            'role'
        ]);

        return response()->json([
            'data' => $this->creatorRepository->updateObject($objectId, $objectDetails)
        ]);
    }

    public function destroy(Request $request):JsonResponse //"destroy" function has the same name not the same method
    {
        $objectId = $request->route('id');
        $this->creatorRepository->deleteObject($objectId); //call method in Repo

        return response()->json(null, Response::HTTP_NO_CONTENT);
    }
}
