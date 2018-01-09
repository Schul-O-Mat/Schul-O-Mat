<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\MessageBag;
use Illuminate\Support\ViewErrorBag;

class UserVerwaltungController extends Controller
{
    public function index() {
    	if(!Auth::guest() and Auth::user()->type == "student") {
    		$currentUser = Auth::user();
		    return view("userVerwaltung.index", compact("currentUser"));
	    } else {
    	    return redirect('');
	    }
    }
	public function changeData(Request $request) {
		if(!Auth::guest() and Auth::user()->type == "student") {

		    //Eingaben validieren
		    $this->validate($request, [
		        'username' => 'unique:users,name|max:255',
                'email' => 'email|unique:users,email',
                'vorname' => 'alpha|max:255',
                'nachname' => 'alpha|max:255'
            ]);

		    //Benutzer finden und Passwort prüfen
		    $user = User::findOrFail(Auth::user()->id);
		    if (!Hash::check($request->input('current-password'), $user->password)) {
                $bag = new MessageBag();
                $bag->add('current-password', 'Das Passwort ist nicht korrekt!');
                return redirect()->back()->with('errors', session()->get('errors', new ViewErrorBag)->put('default', $bag));
            }

            //Daten ändern
		    if ($request->has('username') && trim($request->get('username'))!="") {
		        $user->name = $request->input('username');
            }
            if ($request->has('email') && trim($request->get('email'))!="") {
                $user->email = $request->input('email');
            }
            if ($request->has('vorname') && trim($request->get('vorname'))!="") {
                $user->vorname = $request->input('vorname');
            }
            if ($request->has('nachname') && trim($request->get('nachname'))!="") {
                $user->nachname = $request->input('nachname');
            }

            //Daten speichern
            $user->save();

		    //Benutzer umleiten
            return redirect('/user');

		} else {
			return redirect('');
		}
	}
	public function password() {
		if(!Auth::guest() and Auth::user()->type == "student") {
			$currentUser = Auth::user();
			return view("userVerwaltung.password", compact("currentUser"));
		} else {
			return redirect('');
		}
	}
	public function changePassword(Request $request) {
		if(!Auth::guest() and Auth::user()->type == "student") {

		    //Eingaben validieren
		    $this->validate($request, [
		       'new-password' => 'confirmed|filled|min:6'
            ]);

            //Benutzer finden und Passwort prüfen
            $user = User::findOrFail(Auth::user()->id);
            if (!Hash::check($request->input('current-password'), $user->password)) {
                $bag = new MessageBag();
                $bag->add('current-password', 'Das aktuelle Passwort ist nicht korrekt!');
                return redirect()->back()->with('errors', session()->get('errors', new ViewErrorBag)->put('default', $bag));
            }

            //Passwort ändern und speichern
            $user->password = bcrypt($request->input('new-password'));
            $user->save();

            //Benutzer umleiten
            return redirect('/user/password');

		} else {
			return redirect('');
		}
	}
}
