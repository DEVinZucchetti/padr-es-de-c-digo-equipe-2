<?php

namespace App\Http\Services\Specie;

use App\Http\Repositories\SpecieRepository;

class GetAllSpecieService
{
    private $SpecieRepository;

    public function __construct(SpecieRepository $SpecieRepository)
    {
        $this->SpecieRepository = $SpecieRepository;
    }

    public function handle()
    {
        return $this->SpecieRepository->getAll();
    }
}
