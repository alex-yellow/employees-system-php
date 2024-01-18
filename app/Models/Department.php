<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    protected $table = 'departments';
    protected $guarded = false;
    public $timestamps = false;

    public function professions()
    {
        return $this->belongsToMany(Profession::class, 'department_profession');
    }
}
