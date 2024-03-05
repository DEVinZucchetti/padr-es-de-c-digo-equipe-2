<?php

namespace App\Http\Services\Specie;

use App\Http\Repositories\SpecieRepository;

class CreateSpecieService
{
    private $specieRepository;

    public function __construct(SpecieRepository $specieRepository)
    {
        $this->specieRepository = $specieRepository;
    }

    public function handle(array $data)
    {
        return $this->specieRepository->create($data);
    }
}
