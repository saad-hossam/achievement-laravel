<?php
namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __construct()
    {
        // $this->middleware('auth');
    }

    public function index()
    {
         $departments = Department::active()->with('translations')->get(); // Departments with translations

        return view('Front.home', [
            'departments' => $departments,

        ]);
    }
    public function services()
    {
        return view('Front.services');
    }


}

