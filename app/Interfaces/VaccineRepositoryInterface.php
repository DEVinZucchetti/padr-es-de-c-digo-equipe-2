<?php

namespace App\Interfaces;


interface VaccineRepositoryInterface
{
    public function create(array $data);
    public function getAll();
}
