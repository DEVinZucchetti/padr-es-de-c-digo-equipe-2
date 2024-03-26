<?php

namespace App\Interfaces;

use App\Models\Specie;

interface SpecieRepositoryInterface
{
    public function getAll();

    public function create(array $data);

    public function destroy($id);
}
