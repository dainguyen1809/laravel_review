<?php

namespace App\Http\Controllers;

use App\Enums\StudentStatusEnum;
use App\Models\Student;
use App\Http\Requests\StoreStudentRequest;
use App\Http\Requests\UpdateStudentRequest;
use App\Models\Course;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\View;

class StudentController extends Controller
{

    private $title;
    private $model;
    public function __construct()
    {
        $this->model = new Student();
        $route = Route::currentRouteName();
        $arr = explode('.', $route);
        $arr = array_map('ucfirst', $arr);
        $title = implode(' - ', $arr);
        $studentStatus = StudentStatusEnum::getAllEnum();

        View::share('title', $title);
        View::share('status', $studentStatus);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $students = $this->model
            ->with('course')
            ->paginate(10);
        // dd($students);
        return view('student.index', [
            'students' => $students,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $courses = Course::get();
        return view('student.create', [
            'courses' => $courses,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreStudentRequest $request)
    {
        $this->model->fill($request->validated());
        if ($request->hasFile('avatar')) {
            if (File::exists(public_path($this->model->avatar))) {
                File::delete(public_path($this->model->avatar));
            }
            $avt = $request->avatar;
            $avtName = rand() . '_' . $avt->getClientOriginalName();
            $avt->move(public_path('images/users'), $avtName);
            $path = 'images/users/' . $avtName;
            $this->model->avatar = $path;
        }
        // dd($this->model);
        $this->model->save();
        return redirect()->route('students.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Student $student)
    {
        $courses = Course::get();
        return view('student.edit', [
            'student' => $student,
            'courses' => $courses,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateStudentRequest $request, Student $student)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Student $student)
    {
        //
    }
}
