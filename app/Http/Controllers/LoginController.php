<?php

namespace DestinyH\Http\Controllers;

use DestinyH\Http\Requests\LoginRequest;
use Auth;


class LoginController extends Controller
{
    /*
     * Login Controller
     */
    public function login(LoginRequest $request)
    {
        $remember = $request->input('remember_me');
        if (Auth::attempt(['user_login' => $request['user_login'], 'password' => $request['password'], 'user_confirmed' => 1], $remember)) {
            if (Auth::user()->user_rol == "admin") {
                return redirect()->route('admin_dashboard');
            } else {
                return redirect()->route('gContact');
            }

        }

        $request->session()->flash('no_login', 'error');
        return redirect()->route('gLogin');

    }

    /*
     * Register Controller
     */
    public function register(RegisterRequest $request)
    {
        //Get Location based on IP
        if (getenv('HTTP_CLIENT_IP')) {
            $IP = getenv('HTTP_CLIENT_IP');

        } elseif (getenv('HTTP_X_FORWARDED_FOR')) {
            $IP = getenv('HTTP_X_FORWARDED_FOR');
        } elseif (getenv('HTTP_X_FORWARDED')) {
            $IP = getenv('HTTP_X_FORWARDED');
        } elseif (getenv('HTTP_X_CLUSTER_CLIENT_IP')) {
            $IP = getenv('HTTP_X_CLUSTER_CLIENT_IP');
        } elseif (getenv('HTTP_FORWARDED_FOR')) {
            $IP = getenv('HTTP_FORWARDED_FOR');
        } elseif (getenv('HTTP_FORWARDED')) {
            $IP = getenv('HTTP_FORWARDED');
        } else {
            $IP = $_SERVER['REMOTE_ADDR'];
        }
        $meta = unserialize(file_get_contents('http://www.geoplugin.net/php.gp?ip=' . $IP));
        $pais = $meta['geoplugin_countryName'];
        $news = $request->input('newsletter');
        try {
            $user = new User();
            $user->user_login = $request->user_login;
            $user->password = bcrypt($request->password);
            $user->user_email = $request->user_email;
            $user->user_gender = $request->user_gender;
            $user->user_birth = $request->user_birth;
            $user->user_nicename = $request->user_login;
            $user->user_country = $pais;
            $user->user_about = "";
            if ($news) {
                $user->user_pub = 1;
            } else {
                $user->user_pub = 0;
            }
            $user->save();
        } catch (\Exception $e) {
            abort(500);
        }
        $request->session()->flash('registered', 'succeed');
        return redirect()->route('home');
    }
}
