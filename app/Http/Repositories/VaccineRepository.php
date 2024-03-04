<?php

namespace App\Http\Repositories;

use App\Models\Vaccine;

class VaccineRepository
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
