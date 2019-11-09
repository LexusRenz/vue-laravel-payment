<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class SectionsController extends Controller
{
    public function index()
   {
 
   	$sections = DB::table('sections')->get();
   	return view ('sections.index', compact('sections'));
   }
}
