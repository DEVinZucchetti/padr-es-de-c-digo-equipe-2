<?php

namespace App\Http\Controllers;

use App\Http\Services\Vaccine\CreateVaccineService;
use App\Http\Services\Vaccine\GetAllVaccinesForPetService;
use App\Traits\HttpResponses;

use Illuminate\Http\Request;

use Symfony\Component\HttpFoundation\Response;


class VaccineController extends Controller
{

    use HttpResponses;
    private $vaccineRepository;

    public function store(Request $request, CreateVaccineService $createVaccineService)
    {
        try {

            $body = $request->all();

            $vaccine = $createVaccineService->handle($body);

            return $vaccine;
        } catch (\Exception $exception) {
            return $this->error($exception->getMessage(), Response::HTTP_BAD_REQUEST);
        }
    }


    public function index($id, GetAllVaccinesForPetService $getAllVaccinesForPetService)
    {
        $vaccines = $this->$getAllVaccinesForPetService->handle($id);
        return $vaccines;
    }
}
