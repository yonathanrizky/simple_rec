<?php

namespace App\Http\Controllers;

use App\Vacancy;
use Illuminate\Http\Request;
use Mews\Purifier\Facades\Purifier;

class RecuitmentController extends Controller
{
    public function index()
    {
        $url = "https://jsonplaceholder.typicode.com/posts";
        $data = $this->callService($url);
        return view('recuitment.index');
    }

    public function create()
    {
        return view('recuitment.create');
    }

    public function store(Request $request)
    {
        $job_name = "test";
        $job_type_id = "1";
        $job_qualification_id = "1";
        $company_type_id = "1";
        $sallary_min = 100;
        $sallary_max = 200;
        $activate = true;
        $start_date = "2022-06-05";
        $end_date = "2022-07-05";
        $day_process = 10;
        $description = $request->description;
        $description = Purifier::clean($description);

        Vacancy::insert([
            'job_name' => $job_name,
            'description' => $description,
            'job_type_id' => $job_type_id,
            'job_qualification_id' => $job_qualification_id,
            'company_type_id' => $company_type_id,
            'sallary_min' => $sallary_min,
            'sallary_max' => $sallary_max,
            'activate' => $activate,
            'start_date' => $start_date,
            'end_date' => $end_date,
            'day_process' => $day_process,
        ]);
        return redirect()->to('recuitment');
    }
}
