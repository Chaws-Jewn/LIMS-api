<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory;

    public function project()
    {
        return $this->hasMany(Project::class);
    }

    public function programs() {
        return $this->hasMany(Program::class);
    }
}