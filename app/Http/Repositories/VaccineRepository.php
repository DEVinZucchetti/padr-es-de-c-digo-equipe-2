<?php

namespace App\Http\Repositories;

use App\Interfaces\VaccineRepositoryInterface;
use App\Models\Vaccine;
use App\Traits\HttpResponses;

use Symfony\Component\HttpFoundation\Response;

class VaccineRepository implements VaccineRepositoryInterface
{

    use HttpResponses;

    public function create(array $data)
    {
        return Vaccine::create($data);
    }

    public function getAllVaccinesForPet($id)
    {
        try {

            $vaccines = Vaccine::query()
                ->where('pet_id', $id)
                ->orderBy('date', 'desc')
                ->get();

            return $vaccines;
        } catch (\Exception $exception) {
            return $this->error($exception->getMessage(), Response::HTTP_BAD_REQUEST);
        };
    }
}
