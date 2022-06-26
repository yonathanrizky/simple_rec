<?php

namespace App\Http\Controllers;

use App\Vacancy;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Mews\Purifier\Facades\Purifier;
use Illuminate\Support\Facades\Session;
use Yajra\DataTables\DataTables;

class RecuitmentController extends Controller
{
    public function index()
    {
        $url = "https://jsonplaceholder.typicode.com/posts";
        $data = $this->callService($url);
        return view('recuitment.index');
    }

    public function getData()
    {
        $data = DB::select("select id, job_name, 100 as count_not_process, 10 as count_invite, 0 as count_reject
        from vacancies
        where activate = true
        order by id asc
        ");
        return DataTables::of($data)->make(true);
    }

    public function create()
    {
        $job_type = [
            [
                'id' => 1,
                'description' => 'Tetap'
            ],
            [
                'id' => 2,
                'description' => 'Magang'
            ]
        ];
        $job_type = json_decode(json_encode($job_type));

        $job_qualification = [
            [
                'id' => 1,
                'description' => 'Internship'
            ],
            [
                'id' => 2,
                'description' => 'Freshgraduate'
            ]
        ];
        $job_qualification = json_decode(json_encode($job_qualification));

        $company_type = [
            [
                'id' => 1,
                'description' => 'F&B'
            ],
            [
                'id' => 2,
                'description' => 'Retail'
            ]
        ];
        $company_type = json_decode(json_encode($company_type));
        return view('recuitment.create', compact([
            'job_type', 'job_qualification', 'company_type'
        ]));
    }

    public function show($id)
    {
        $job_type = [
            [
                'id' => 1,
                'description' => 'Tetap'
            ],
            [
                'id' => 2,
                'description' => 'Magang'
            ]
        ];
        $job_type = json_decode(json_encode($job_type));

        $job_qualification = [
            [
                'id' => 1,
                'description' => 'Internship'
            ],
            [
                'id' => 2,
                'description' => 'Freshgraduate'
            ]
        ];
        $job_qualification = json_decode(json_encode($job_qualification));

        $company_type = [
            [
                'id' => 1,
                'description' => 'F&B'
            ],
            [
                'id' => 2,
                'description' => 'Retail'
            ]
        ];
        $company_type = json_decode(json_encode($company_type));
        $data = Vacancy::find($id);
        return view('recuitment.edit', compact([
            'data', 'job_type', 'job_qualification', 'company_type'
        ]));
    }

    public function store(Request $request)
    {
        $job_name = $request->job_name;
        $job_type_id = $request->job_type_id;
        $job_qualification_id = $request->job_qualification_id;
        $company_type_id = $request->company_type_id;
        $sallary_min = $request->sallary_min;
        $sallary_max = $request->sallary_max;
        $activate = true;
        $start_date = $request->start_date;
        $end_date = $request->end_date;
        $day_process = $request->day_process;
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
        Session::flash('success', 'Data Berhasil Disimpan');
        return redirect()->to('recuitment');
    }

    public function update(Request $request, $id)
    {
        $job_name = $request->job_name;
        $job_type_id = $request->job_type_id;
        $job_qualification_id = $request->job_qualification_id;
        $company_type_id = $request->company_type_id;
        $sallary_min = $request->sallary_min;
        $sallary_max = $request->sallary_max;
        $activate = true;
        $start_date = $request->start_date;
        $end_date = $request->end_date;
        $day_process = $request->day_process;
        $description = $request->description;
        $description = Purifier::clean($description);

        Vacancy::where('id', $id)->update([
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

        Session::flash('success', 'Data Berhasil Diubah');
        return redirect()->to('recuitment');
    }

    public function destroy($id)
    {
        $vacancy = Vacancy::find($id);
        $vacancy->delete();
        Session::flash('success', 'Data Berhasil Dihapus');
        return redirect()->to('recuitment');
    }
}
