<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Task_Assign extends Model
{
    /** @use HasFactory<\Database\Factories\TaskAssignFactory> */
     use HasFactory, Notifiable;

     protected $fillable=['title','task_type','employee_id','date','start_time','end_time','description'];

     protected $table="assigns";
}
