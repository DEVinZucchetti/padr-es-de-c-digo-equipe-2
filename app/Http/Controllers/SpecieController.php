<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateSpecieRequest;

use App\Http\Services\Specie\CreateSpecieService;
use App\Http\Services\Specie\DeleteOneSpecieService;
use App\Http\Services\Specie\GetAllSpecieService;

use App\Traits\HttpResponses;
use Symfony\Component\HttpFoundation\Response;

class SpecieController extends Controller
{
    use HttpResponses;

    public function index(GetAllSpecieService $getAllSpecieService)
    {
        $species = $getAllSpecieService->handle();
        return $species;
    }

    public function store(CreateSpecieRequest $request, CreateSpecieService $createSpecieService)
    {
        try {
            $body = $request->all();
            $specie = $createSpecieService->handle($body);
            return $specie;
        } catch (\Exception $exception) {
            return $this->error($exception->getMessage(), Response::HTTP_BAD_REQUEST);
        }
    }

    public function destroy($id, DeleteOneSpecieService $deleteOneSpecieService)
    {
        $response = $deleteOneSpecieService->delete($id);
        return $response;
    }
}
