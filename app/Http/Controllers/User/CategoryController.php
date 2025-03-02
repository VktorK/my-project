<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Resources\User\Category\CategoryIndexResource;
use App\Services\User\CategoryService;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

class CategoryController extends Controller
{
    public function index(): Factory|View|Application
    {
        $products = CategoryService::index();
        $categoryResource = CategoryIndexResource::collection($products)->resolve();
        return view('user/category/index', compact('categoryResource'));
    }
}
