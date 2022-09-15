<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    public $fillable = ['name'];

    public $timestamps = false;

    public function user()
    {
        return $this->belongsToMany(User::class);
    }
}
