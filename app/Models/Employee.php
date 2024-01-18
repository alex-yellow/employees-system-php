<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $table = 'employees';
    protected $guarded = false;
    public $timestamps = false;

    public function department()
    {
        return $this->belongsTo(Department::class);
    }

    public function profession()
    {
        return $this->belongsTo(Profession::class);
    }
}
