<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateSpecieRequest;
use App\Http\Services\Specie\CreateSpecieService;
use App\Http\Services\Specie\GetAllSpecieService;
use App\Models\Pet;
use App\Models\Specie;
use App\Traits\HttpResponses;
use Exception;
use Illuminate\Http\Request;
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

    public function destroy($id)
    {
        $specie = Specie::find($id);

        $count = Pet::query()->where('specie_id', $id)->count();

        if ($count !== 0) return $this->error('Existem pets usando essa espécie', Response::HTTP_CONFLICT);

        if (!$specie) return $this->error('Dado não encontrado', Response::HTTP_NOT_FOUND);

        $specie->delete();

        return $this->response('', Response::HTTP_NO_CONTENT);
    }
}
