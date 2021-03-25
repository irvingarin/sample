<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Classes;
use App\Models\ClassMember;
use App\Http\Requests\ClassRequest;
use App\Http\Requests\EnrollRequest;

class ClassesController extends Controller
{
    protected $classMemberRecord;
    protected $classesRecord;

    public function __construct(Classes $classes, ClassMember $classMember)
    {
        $this->classesRecord = $classes;
        $this->classMemberRecord = $classMember;
    }

    public function index()
    {
        $classes = $this->classesRecord->getClassesRecord();
        return view('classes.index', ['classes' => $classes]);
    }
    public function create()
    { 
        return view('classes.create');
    }
    public function store(ClassRequest $request)
    {
        $this->classesRecord->createClassRecord($request);
        return redirect(route('classes.index'));
    }
    public function class($id)
    {
        $class = $this->classesRecord->getClassRecord($id);
        $classMembers = $this->classMemberRecord->getClassMemberRecord($class->class_code);
        return view('classes.class', ['class' => $class, 'classMembers' => $classMembers]);
    }
    public function add()
    {
        return view('classes.add');
    }
    public function enroll(EnrollRequest $request)
    {
        $this->classMemberRecord->createClassMemberRecord($request);
        return redirect(route('classes.index'));
    }
    public function unenroll($id)
    {
        $this->classMemberRecord->deleteClassMemberRecord($id);
        return back();
    }
}
