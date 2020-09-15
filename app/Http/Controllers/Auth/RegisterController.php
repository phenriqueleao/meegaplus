<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use App\Admin;
use App\Evaluation;
use App\Evaluator;
use App\Student;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class RegisterController extends Controller
{   
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
        $this->middleware('guest:admin');
        $this->middleware('guest:evaluator');
        $this->middleware('guest:student');
    }

    public function showAdminRegisterForm()
    {
        return view('auth.register', [
            'url' => 'admin'
            ]);
    }

    public function showEvaluatorRegisterForm()
    {
        return view('auth.register', [
            'url' => 'evaluator'
            ]);
    }
    
    public function showStudentRegisterForm()
    {
        $evaluations = Evaluation::all();

        return view('auth.register', [
            'url' => 'student',
            'evaluations' => $evaluations,
        ]);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }

    protected function createAdmin(Request $request)
    {
        $this->validator($request->all())->validate();
        Admin::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
        ]);
        return redirect()->intended('login/admin');
    }

    protected function createEvaluator(Request $request)
    {
        $this->validator($request->all())->validate();
        Evaluator::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'cpf' => $request['cpf'],
            'institution' => $request['institution'],
            'password' => Hash::make($request['password']),
        ]);
        return redirect()->intended('evaluator');
    }

    protected function createStudent(Request $request)
    {
        $this->validator($request->all())->validate();
        Student::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'evaluation_id' => $request['evaluation_id'],
            'password' => Hash::make($request['password']),
        ]);
        return redirect()->intended('student');
    }
}
