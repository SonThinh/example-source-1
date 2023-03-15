<?php

namespace App\Http\Controllers\CMS;

use App\Actions\CMS\Auth\LoginAction;
use App\Actions\CMS\Auth\LogoutAction;
use App\Actions\CMS\Auth\ProfileAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Http\JsonResponse;

class AuthController extends Controller
{
    /**
     * @param LoginRequest $request
     * @param LoginAction $action
     * @return JsonResponse
     * @throws AuthenticationException
     */
    public function login(LoginRequest $request, LoginAction $action): JsonResponse
    {
        return ($action)($request->validated());
    }

    /**
     * @param \App\Actions\CMS\Auth\ProfileAction $action
     * @return JsonResponse
     */
    public function profile(ProfileAction $action): JsonResponse
    {
        return ($action)();
    }

    /**
     * @param \App\Actions\CMS\Auth\LogoutAction $action
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout(LogoutAction $action): JsonResponse
    {
        return ($action)();
    }
}
