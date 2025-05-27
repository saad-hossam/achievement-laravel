<?php
namespace App\Http\Controllers;

use App\Models\Slider;
use App\Models\Gallary;
use App\Models\History;
use App\Models\Partner;
use App\Models\Project;
use App\Models\Service;
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


}

