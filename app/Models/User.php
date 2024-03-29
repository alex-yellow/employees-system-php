<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $table = 'users';
    protected $guarded = false;
    public $timestamps = false;

    public function isAdmin()
    {
        return (bool) $this->is_admin;
    }
}
