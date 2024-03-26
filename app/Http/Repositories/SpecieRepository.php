<?php

namespace App\Http\Repositories;

use App\Interfaces\SpecieRepositoryInterface;
use App\Models\Specie;

Class SpecieRepository implements SpecieRepositoryInterface{

    public function getAll(){

        return Specie::all();
    }

    public function create(array $data){
        return Specie::create($data);
    }
    public function destroy($id){
        return Specie::find($id);
    }
}
