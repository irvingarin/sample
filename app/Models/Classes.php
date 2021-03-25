<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Auth;

class Classes extends Model
{
    use HasFactory;
    protected $fillable = ['class_code', 'class_name', 'instructor'];

    public function getClassesRecord()
    {
        if(Auth::user()->level == 'teacher'){
            return $this->where('instructor', Auth::user()->email)->get();
        }else{
            return $this->join('class_members','classes.class_code', '=', 'class_members.class_code')
            ->where('class_members.email', Auth::user()->email)->select('classes.*')
            ->get();
        }
    }
    public function createClassRecord($request){
        $this->create([
            'class_code' => Str::random(8),
            'class_name' => $request->class_name,
            'instructor' => Auth::user()->email,
        ]);
    }
    public function getClassRecord($id)
    {
        return $this->where('id', $id)->first();
    }
}
