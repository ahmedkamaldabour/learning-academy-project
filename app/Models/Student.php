<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
	use HasFactory;

	protected $fillable = ['name', 'email', 'phone', 'specialized_at'];

	public function courses()
	{
		return $this->belongsToMany(Course::class)->withPivot('status');
	}

	public function trainers()
	{
		return $this->belongsToMany(Trainer::class);
	}

}
