<?php

namespace App\Http\Services\Specie;

use App\Http\Repositories\SpecieRepository;

class CreateSpecieService
{
    private $SpecieRepository;

    public function __construct(SpecieRepository $SpecieRepository)
    {
        $this->SpecieRepository = $SpecieRepository;
    }

    public function handle(array $data)
    {
        return $this->SpecieRepository->create($data);
    }
}
