<?php

namespace App\Http\Services\Specie;

use App\Http\Repositories\PetRepository;
use App\Http\Repositories\SpecieRepository;


use Symfony\Component\HttpFoundation\Response;

class DeleteOneSpecieService
{
    private $specieRepository;
    private $petRepository;

    public function __construct(SpecieRepository $specieRepository, PetRepository $petRepository)
    {
        $this->specieRepository = $specieRepository;
        $this->petRepository = $petRepository;
    }

    public function delete($id)
    {
        $specie = $this->specieRepository->getOne($id);
        if (!$specie) {
            return response()->json(['error' => 'Espécie não encontrada'], Response::HTTP_NOT_FOUND);
        }

        $count = $this->petRepository->countBySpecieId($id);
        if ($count !== 0) {
            return response()->json(['error' => 'Existem pets usando essa espécie'], Response::HTTP_CONFLICT);
        }

        $this->specieRepository->deleteOne($specie);
        return response()->json([], Response::HTTP_NO_CONTENT);
    }
}
