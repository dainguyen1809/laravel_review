<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Http\Requests\StoreCourseRequest;
use App\Http\Requests\UpdateCourseRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\View;

class CourseController extends Controller
{
    private $title;
    private $model;
    public function __construct()
    {
        $this->model = new Course();
        $route = Route::currentRouteName();
        $arr = explode('.', $route);
        $arr = array_map('ucfirst', $arr);
        $title = implode(' - ', $arr);
        View::share('title', $title);
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->get('q');
        $courses = $this->model->withCount('students')
            ->where('name', 'like', '%' . $search . '%')
            ->paginate(10);
        $courses->appends([
            'q' => $search,
        ]);
        return view("course.index", [
            'courses' => $courses,
            'q' => $search,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('course.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCourseRequest $request)
    {
        $course = $this->model;
        $course->fill($request->validated())->save();

        return redirect()->route('courses.index');
    }

    /**
     * Display the specified resource.
     */
    // public function show()
    // {
    //     return view('layouts.master');
    // }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Course $course)
    {
        return view('course.edit', [
            'course' => $course,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCourseRequest $request, $courseId)
    {
        $course = $this->model->findOrFail($courseId);
        $course->fill($request->validated());
        return redirect()->route('courses.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($courseId)
    {
        // $this->model->destroy($courseId);
        $this->model->find($courseId)->delete();
        return redirect()->route('courses.index');
    }
}
