<?php

namespace App\Http\Repositories;

use App\Interfaces\VaccineRepositoryInterface;
use App\Models\Vaccine;

use Symfony\Component\HttpFoundation\Response;

class VaccineRepository implements VaccineRepositoryInterface
{


    public function create(array $data)
    {
        return Vaccine::create($data);
    }

    public function getAllVaccinesForPet($id)
    {
        return Vaccine::find($id);
    }
}
