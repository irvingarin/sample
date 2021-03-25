<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;
    protected $fillable = ['fname', 'mname', 'lname', 'dob', 'email'];
    public $table = 'profile';

    public function createProfileRecord($request)
    {
        $this->create([
            'fname' => $request->fname,
            'mname' => $request->mname,
            'lname' => $request->lname,
            'dob' => $request->dob,
            'email' => $request->email,
        ]);
    }
    public function user()
    {
        return $this->belongsTo('App\Models\User', 'email');
    }
}
