<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;

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
	public function changeData() {
		if(!Auth::guest() and Auth::user()->type == "student") {
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
	public function changePassword() {
		if(!Auth::guest() and Auth::user()->type == "student") {
		} else {
			return redirect('');
		}
	}
}
