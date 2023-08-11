<?php

namespace App\Http\Controllers;

use App\Interfaces\RepositoryInterface;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class AudioController extends Controller
{
    //
    private RepositoryInterface $audioRepository;

    public function __construct(RepositoryInterface $audioRepository)
    {
        $this->audioRepository = $audioRepository;
    }

    public function index(): JsonResponse
    {
        return response()->json([
            'data' => $this->audioRepository->getAllObject()
        ]);
    }

    public function store(Request $request): JsonResponse
    {
        $objectDetails = $request->only([
            'name',
            'audioDirectory'
        ]);

        return response()->json(
            [
                'data' => $this->audioRepository->createObject($objectDetails)
            ],
            Response::HTTP_CREATED
        );
    }

    public function show(Request $request): JsonResponse
    {
        $objectId = $request->route('id');

        return response()->json([
            'data' => $this->audioRepository->getObjectById($objectId)
        ]);
    }

    public function update(Request $request): JsonResponse
    {
        $objectId = $request->route('id');
        $objectDetails = $request->only([
            'name',
            'audioDirectory'
        ]);
        
        return response()->json([
            'data' => $this->audioRepository->updateObject($objectId, $objectDetails)
        ]);
    }

    public function destroy(Request $request): JsonResponse
    {
        $objectId = $request->route('id');
        $this->audioRepository->deleteObject($objectId);

        return response()->json(null, Response::HTTP_NO_CONTENT);
    }
}
