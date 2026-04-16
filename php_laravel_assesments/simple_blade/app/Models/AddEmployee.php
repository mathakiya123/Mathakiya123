<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class AddEmployee extends Model
{
    /** @use HasFactory<\Database\Factories\AddEmployeeFactory> */
    use HasFactory,Notifiable;

    protected $fillable = [
        'name',
        'age',
        'phone',
        'address',
    ];

  
    protected $table="add_employees";
}
