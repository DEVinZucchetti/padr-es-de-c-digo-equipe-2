<?php

namespace App\Http\Repositories;

use App\Interfaces\SpecieRepositoryInterface;

use App\Models\Specie;

class SpecieRepository implements SpecieRepositoryInterface
{
    public function create(array $data)
    {
        return Specie::create($data);
    }

    public function getAll()
    {
        return Specie::all();
    }

    public function getOne($id)
    {
        return Specie::find($id);
    }

    public function deleteOne(Specie $specie)
    {
        $specie->delete();
        return $specie;
    }
}
