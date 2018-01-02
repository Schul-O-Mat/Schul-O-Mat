<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;

class UserVerwaltungController extends Controller
{
    public function index() {
    	if(!Auth::guest() and Auth::user()->type == "student") {
		    return view("userVerwaltung.index");
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
}
