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
        $partners = Partner::active()->get();
        $sliders = Slider::active()->with('translations')->get();
        $departments = Department::active()->with('translations')->get(); // Departments with translations
        $projects = Project::active()->with('translations')->paginate(4); // Paginate projects
        $services = Service::active()->paginate(3); // Paginate services

        return view('Front.home', [
            'sliders' => $sliders,
            'projects' => $projects,
            'departments' => $departments,
            'partners'=>$partners,
           'services' => $services,
        ]);
    }

    public function service_details($id)
    {
        // Fetch service with its translations (eager loading)
        $service = Service::with('translations')->find($id);
        return view('Front.service_details', ['service' => $service]);
    }
    public function contact()
    {
        return view('Front.contact');
    }
    public function services()
    {
        // $services = Service::active()->with('translations')->get();
        return view('Front.services');
    }

    public function projects_all()
    {
        $projects = Project::active()->with('translations')->get();
        return view('Front.projects', compact('projects'));
    }


    public function about(){
        $histories=History::active()->get();
        return view('Front.about', compact('histories'));
    }

    public function projects()
    {
        $projects = project::active()->with('translations')->get();
        $departments = Department::active()->all();
        return view('Front.projects', ['projects' => $projects, 'departments' => $departments]);
    }
    public function projects_by_department($department_id)
    {
        // Fetch the department and its related projects
        $department = Department::find($department_id);

        if (!$department) {
            abort(404, 'Department not found');
        }

        // Get all projects related to this department
        $projects = $department->projects;

        return view('Front.projects_by_department', [
            'department' => $department,
            'projects' => $projects,
        ]);
    }

    public function project_details($id)
    {
    // Fetch project with related photos
    $project = Project::find($id);
    if (!$project) {
        abort(404, 'project not found');
    }
    return view('Front.project_details', [
        'project' => $project,
        'departments' => Department::all(),
    ]);
}



}
