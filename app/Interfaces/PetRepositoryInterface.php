<?php

namespace App\Interfaces;

interface PetRepositoryInterface
{
    public function countBySpecieId($specieId);
}
