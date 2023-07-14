<?php

namespace App\Http\Controllers\Dokter;

use Auth;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    /**
     * Where to redirect dokter after login.
     *
     * @var string
     */
    protected $redirectTo = '/dokter';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest:dokter')->except('logout');
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showLoginForm()
    {
        return view('dokter.login');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function login(Request $request)
    {
        $input = $request->all();

        $this->validate($request, [
            'username' => 'required',
            'password' => 'required',
        ]);

        $fieldType = filter_var($request->username, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';
        if(Auth::guard('dokter')->attempt(array($fieldType => $input['username'], 'password' => $input['password'])))
        {
            return redirect()->route('dokter.dashboard');
        }else{
            return redirect()->route('dokter.login')->with('status', 'Anda gagal login!');
        }
        // $this->validate($request, [
        //     'email'   => 'required|email',
        //     'password' => 'required|min:6'
        // ]);
        // if (Auth::guard('dokter')->attempt([
        //     'email' => $request->email,
        //     'password' => $request->password
        // ], $request->get('remember'))) {
        //     return redirect()->intended(route('dokter.dashboard'));
        // }
        // return back()->withInput($request->only('email', 'remember'))->with('status', 'Anda gagal login!');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function logout(Request $request)
    {
        Auth::guard('dokter')->logout();
        $request->session()->invalidate();
        return redirect()->route('dokter.login');
    }
}
