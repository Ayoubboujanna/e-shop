<?php

namespace App\Models;


use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Product extends Model
{
    use HasFactory;


    protected $fillable = [
        'title', 'price', 'id_category', 'description', 'file_path', "created_at", "updated_at"
    ];


    // protected $guarded = [];

    public function category()
    {

        return $this->belongsTo(Category::class, 'id_category');
    }

}
