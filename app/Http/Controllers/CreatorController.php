<?php

namespace App\Http\Controllers;

use App\Interfaces\CreatorRepositoryInterface;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;


class CreatorController extends Controller
{
    //
    private CreatorRepositoryInterface $creatorRepository;
    public function __construct(CreatorRepositoryInterface $creatorRepository)
    {
        $this->creatorRepository = $creatorRepository;
    }

    public function index(): JsonResponse
    {
        return response()->json([
            'data' => $this->creatorRepository->getAllCreator()
        ]);
    }

    public function store(Request $request): JsonResponse
    {
        // variable which is created in interface also be used
        $creatorDetails = $request->only([
            'name',
            'role'
        ]);
        // using method of creatorRepository which is called from Model's method
        return response()->json(
            [
                'data' => $this->creatorRepository->createCreator($creatorDetails)
            ],
            Response::HTTP_CREATED
        );
    }

    public function show(Request $request): JsonResponse
    {
        $creatorId = $request->route('id'); // taken from api.php route

        return response()->json([
            'data' => $this->creatorRepository->getCreatorById($creatorId)
        ]);
    }

    public function update(Request $request): JsonResponse
    {
        $creatorId = $request->route('id');
        $creatorDetails = $request->only([
            'name',
            'role'
        ]);

        return response()->json([
            'data' => $this->creatorRepository->updateCreator($creatorId, $creatorDetails)
        ]);
    }

    public function destroy(Request $request):JsonResponse //"destroy" function has the same name not the same method
    {
        $creatorId = $request->route('id');
        $this->creatorRepository->deleteCreator($creatorId); //call method in Repo

        return response()->json(null, Response::HTTP_NO_CONTENT);
    }
}
