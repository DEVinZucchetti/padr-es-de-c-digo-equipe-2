<?php

namespace App\Http\Repositories;

use App\Interfaces\PetRepositoryInterface;
use App\Models\Pet;

class PetRepository implements PetRepositoryInterface
{
    public function countBySpecieId($specieId)
    {
        return Pet::where('specie_id', $specieId)->count();
    }
}
