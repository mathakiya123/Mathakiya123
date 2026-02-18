<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class leave extends Model
{
    /** @use HasFactory<\Database\Factories\LeaveFactory> */
      use HasFactory, Notifiable;
      
    protected  $fillable=['employee_name','type','start_date','end_date','reason','status'];

    protected $table="leaves";
}
