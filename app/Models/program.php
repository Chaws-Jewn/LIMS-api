<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Program extends Model
{
    use HasFactory;
    protected $fillable = ['program', 'full_program', 'category', 'department_id'];

    public function projects()
    {
        return $this->hasMany(Project::class);
    }

    public function users()
    {
        return $this->hasMany(User::class);
    }


    public function program()
    {
        return $this->belongsTo(Program::class);
    }

    // public function program()
    // {
    //     return $this->belongsTo(Program::class, 'program_id');
    // }

    public function department()
    {
        return $this->belongsTo(Department::class, 'department_id');
    }


}