<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Model\User;
use App\Model\Project;

class Task extends Model
{
    use HasFactory;

    protected $table = 'tasks';

    protected $guarded = [];

    public function user()
    {
    	return $this->belongsTo(User::class);
    }

    public function project()
    {
    	return $this->belongsTo(Project::class);
    }
    
}
