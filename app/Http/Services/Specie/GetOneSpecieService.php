<?php

namespace App\Http\Services\Specie;

use App\Http\Repositories\SpecieRepository;

class GetOneSpecieService
{
    private $specieRepository;

    public function __construct(SpecieRepository $specieRepository)
    {
        $this->specieRepository = $specieRepository;
    }

    public function handle($id)
    {
        return $this->specieRepository->getOne($id);
    }
}
