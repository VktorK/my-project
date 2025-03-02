<?php

namespace App\Services\User;

use App\Models\Category;

class CategoryService
{
    public static function index(): \Illuminate\Database\Eloquent\Collection
    {
        return Category::all();
    }
}
