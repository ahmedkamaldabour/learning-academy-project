<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trainer extends Model
{
    use HasFactory;
	protected $fillable = ['name', 'email', 'phone', 'address', 'image', 'specialized_at'];


	public function courses()
	{
		return $this->hasMany(Course::class);
	}

	public function students()
	{
		return $this->belongsToMany(Student::class);
	}

}
