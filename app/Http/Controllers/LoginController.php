<?php

namespace App\Http\Controllers;

use Jenssegers\Agent\Agent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    public function index()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $email = $request->input('email');
        $data = [
            'email' => $request->input('email'),
            'password' => $request->input('password'),
        ];
        $agent = new Agent();
        $device = [
            'platform' => $agent->platform(),
            'browser' => $agent->browser(),
            'browser_version' => $agent->version($agent->browser()),
            'device' => $agent->device(),
            'mobile' => $agent->isMobile(),
            'mobile_version' => $agent->version($agent->isMobile())
        ];
        $device = json_encode($device);

        if (Auth::Attempt($data))
        {
            if (Auth::user()->status === false)
            {
                $this->insert('login_logs', [
                    'email' => $email,
                    'login' => false,
                    'device' => $device,
                    'login_at' => date('Y-m-d H:i:s'),
                    'ip_visitor' => $_SERVER['REMOTE_ADDR']
                ]);
                Session::flash('error', 'User Tidak Aktif');
                return redirect('/');
            }
            $this->insert('login_logs', [
                'email' => $email,
                'login' => true,
                'device' => $device,
                'login_at' => date('Y-m-d H:i:s'),
                'ip_visitor' => $_SERVER['REMOTE_ADDR']
            ]);
            return redirect('dashboard');
        }
        else
        {
            $this->insert('login_logs', [
                'email' => $email,
                'login' => false,
                'device' => $device,
                'login_at' => date('Y-m-d H:i:s'),
                'ip_visitor' => $_SERVER['REMOTE_ADDR']
            ]);
            Session::flash('error', 'Email atau Password Salah');
            return redirect('/');
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
}
