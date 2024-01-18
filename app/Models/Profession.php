<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profession extends Model
{
    protected $table = 'professions';
    protected $guarded = false;
    public $timestamps = false;

    public function departments()
    {
        return $this->belongsToMany(Department::class, 'department_profession');
    }
}
