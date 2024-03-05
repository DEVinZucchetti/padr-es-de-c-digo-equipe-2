<?php

namespace App\Interfaces;

use App\Models\Specie;

interface SpecieRepositoryInterface
{
    public function create(array $data);
    public function getAll();
    public function getOne($id);
}
