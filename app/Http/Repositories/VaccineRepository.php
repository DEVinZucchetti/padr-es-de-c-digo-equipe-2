<?php

namespace App\Http\Repositories;

use App\Interfaces\VaccineRepositoryInterface;
use App\Models\Vaccine;

class VaccineRepository implements VaccineRepositoryInterface
{
    public function create(array $data)
    {
        return Vaccine::create($data);
    }

    public function getAll()
    {
        return Vaccine::all();
    }
}
