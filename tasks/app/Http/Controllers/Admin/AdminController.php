<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\LastActivity;
use Carbon\Carbon;

class AdminController extends Controller
{
	public function __construct() {
		$this->middleware('HasAdmin');
	}
    public function index() {
    	$activities = LastActivity::orderBy('id', 'DESC')->get();

    	return view('admin.index', compact('activities'));
    }
}
