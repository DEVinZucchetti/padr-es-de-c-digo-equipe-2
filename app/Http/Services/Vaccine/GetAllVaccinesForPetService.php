<?php

use App\Http\Repositories\VaccineRepository;

class GetAllVaccinesForPetService
{

    private $vaccineRepository;

    public function __construct(VaccineRepository $vaccineRepository)
    {
        $this->vaccineRepository = $vaccineRepository;
    }

    public function handle(array $id)
    {
        return $this->vaccineRepository->getAllVaccinesForPet($id);
    }
}
