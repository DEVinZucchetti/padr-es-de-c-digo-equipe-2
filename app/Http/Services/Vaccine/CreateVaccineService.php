<?php

use App\Http\Repositories\VaccineRepository;

class CreateVaccineService
{

    private $vaccineRepository;

    public function __construct(VaccineRepository $vaccineRepository)
    {
        $this->vaccineRepository = $vaccineRepository;
    }

    public function handle(array $data)
    {
        return $this->vaccineRepository->create($data);
    }
}
