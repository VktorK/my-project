<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\User\UserStoreRequest;
use App\Http\Requests\User\User\UserUpdateRequest;
use App\Http\Resources\User\UserStoreResource;
use App\Http\Resources\User\UserUpdateResource;
use App\Services\User\UserService;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;

class UserController extends Controller
{
    public function create(): Factory|View|Application
    {
        return view('user/create');
    }

    public function store(UserStoreRequest $request): Factory|View|Application
    {
            $data = $request->validated();
            $user = UserService::store($data);
            $resourceUser = UserStoreResource::make($user)->resolve();
            return view('user/show', compact('resourceUser'));
    }


    public function update(UserUpdateRequest $request): Factory|View|Application
    {
        $data = $request->validated();
        $user = UserService::update($data);
        $resourceUser =  UserUpdateResource::make($user)->resolve();
        return view('user/show', compact('resourceUser'));
    }

    /**
     * @return JsonResponse
     */
    public function destroy(): JsonResponse
    {
        UserService::destroy();
        return response()->json([
            'message' => 'Удалил сам себя'
        ], status: ResponseAlias::HTTP_OK);
    }
}
