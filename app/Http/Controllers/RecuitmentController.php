<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RecuitmentController extends Controller
{
    public function index()
    {
        $url = "https://jsonplaceholder.typicode.com/posts";
        $data = $this->callService($url);
        return view('recuitment.index');
    }
}
