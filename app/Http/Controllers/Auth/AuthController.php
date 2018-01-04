<?php

namespace App\Http\Controllers\Auth;

use App\schulen;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use PhpParser\Node\Expr\Cast\Object_;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => ['logout', 'getLogout']]);
    }
    public function getRegister()
    {
	    $staedteraw = DB::table("schuldetails")->select("ort")->groupBy("ort")->get();
	    $staedte = new \stdClass();
	    foreach ($staedteraw as $s) {
	    	$ort = $s->ort;
	    	$staedte->$ort = "";
	    }
	    $staedte = json_encode($staedte);
    	return view("auth.register", compact("staedte"));
    }
    public function schulenSearchOrt(Request $request) {
	    $ort = $request->get("ort");
	    $data = schulen::whereHas("details", function($query) use($ort) {
		    $query->where('ort', '=', $ort);
	    })->get();
	    $schulen = new \stdClass();
	    foreach($data as $schule)
	    {
		    $bezeichnung           = $schule->bezeichnung . " (ID:" . $schule->id . ")";
		    $schulen->$bezeichnung = "";

	    }
	    return response()->json($schulen);
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
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
	        'vorname' => 'required|max:255',
            'nachname' => 'max:255'
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
	        'vorname' => $data['vorname'],
	        'nachname' => $data['nachname'],
        ]);
    }
}
