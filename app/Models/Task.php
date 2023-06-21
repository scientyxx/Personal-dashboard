<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $table = "task";
    protected $primaryKey = "id";
    protected $fillable = [
        'id', 'task_name', 'difficulty_level', 'due-date', 'category', 'status',
    ];
    use HasFactory;
}
