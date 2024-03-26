<?php

namespace App\Http\Controllers;

use App\Http\Services\CreateSpecieService;
use App\Models\Pet;
use App\Models\Specie;
use App\Traits\HttpResponses;
use Exception;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;


class SpecieController extends Controller
{
    use HttpResponses;

    /*public function index() {
        $species = $this->specieRepository->getAll();
        return $species;
    }*/


    public function store(Request $request, CreateSpecieService $createSpecieService)
    {
        try {
            $request->validate([
                'name' => 'required|string|unique:species|max:50'
            ]);

            $body = $request->all();

            $specie = $createSpecieService->handle($body);

            return $specie;
        } catch (\Exception $exception) {
            return $this->error($exception->getMessage(), Response::HTTP_BAD_REQUEST);
        }
    }


    public function destroy($id) {
        $specie = Specie::find($id);

        $count = Pet::query()->where('specie_id', $id)->count();

        if($count !== 0) return $this->error('Existem pets usando essa espécie', Response::HTTP_CONFLICT);

        if(!$specie) return $this->error('Dado não encontrado', Response::HTTP_NOT_FOUND);

        $specie->delete();

        return $this->response('', Response::HTTP_NO_CONTENT);
    }

}
