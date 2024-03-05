<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateVaccineRequest;

use App\Http\Services\Vaccine\CreateVaccineService;
use App\Http\Services\Vaccine\GetAllVaccinesForPetService;

use App\Models\Vaccine;

use App\Traits\HttpResponses;

use Symfony\Component\HttpFoundation\Response;


class VaccineController extends Controller
{

    use HttpResponses;
    private $vaccineRepository;

    public function store(CreateVaccineRequest $request, CreateVaccineService $createVaccineService)
    {

        try {
            $body = $request->all();

            $vaccine = $createVaccineService->handle($body);
        } catch (\Exception $exception) {
            return $this->error($exception->getMessage(), Response::HTTP_BAD_REQUEST);
        };
        return $vaccine;
    }


    public function index($id, GetAllVaccinesForPetService $getAllVaccinesForPetService)
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
        $vaccines = $getAllVaccinesForPetService->handle($id);
        return $vaccines;
    }
}
