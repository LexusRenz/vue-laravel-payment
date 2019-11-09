<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class StudentsController extends Controller
{
    public function index(){

	if (Request()->has('section_id')) {
	
	}
		$students = DB::table('students')
		->leftJoin('payments','students.id', '=', 'payments.student_id')
		->where('section_id', Request()->section_id)->get();
		return $students;
	}
}
