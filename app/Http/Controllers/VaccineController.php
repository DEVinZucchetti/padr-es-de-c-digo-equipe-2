<?php

namespace App\Http\Controllers;

use App\Http\Repositories\VaccineRepository;
use App\Models\Vaccine;
use App\Traits\HttpResponses;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class VaccineController extends Controller
{

    use HttpResponses;

    private $vaccineRepository;

    public function __construct(VaccineRepository $vaccineRepository)
    {
        $this->vaccineRepository = $vaccineRepository;
    }

    public function store(Request $request)
    {
        try {

            $data = $request->all();

            // validar dados do body


            // $vaccine = Vaccine::create([...$data, 'professional_id' => $request->user()->id ]);


            $vaccine = $this->vaccineRepository->create($data);

            return $vaccine;
        } catch (\Exception $exception) {
            return $this->error($exception->getMessage(), Response::HTTP_BAD_REQUEST);
        }
    }


    public function index($id)
    {
        $vaccines = $this->vaccineRepository->getAllVaccinesForPet($id);
        return $vaccines;
    }
}
