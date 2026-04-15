<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    /** @use HasFactory<\Database\Factories\ProductFactory> */
    use HasFactory;

    
    protected $fillable=['name','desc','price','images','category_id'];
     protected $table="products";

     public function category()
     {
        $this->bilogsTo(category::class);
     }
}
