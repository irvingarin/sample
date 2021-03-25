<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Auth;

class ClassMember extends Model
{
    use HasFactory;
    public $table = 'class_members';
    protected $fillable = ['class_code', 'email'];

    public function createClassMemberRecord($request)
    {
        $this->create([
            'class_code' => $request->class_code,
            'email' => Auth::user()->email,
        ]);
    }
    public function getClassMemberRecord($class_code)
    {
        return $this->join('profile', 'class_members.email', '=', 'profile.email')
        ->where('class_members.class_code', $class_code)
        ->select('profile.fname','profile.mname','profile.lname','class_members.id')
        ->get();
    }
    public function deleteClassMemberRecord($id)
    {
        $this->where('id', $id)->delete();
    }
}
