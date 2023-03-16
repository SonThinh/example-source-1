<?php

namespace App\Http\Controllers\User;

use App\Actions\User\Form\ConfirmAction;
use App\Actions\User\Form\GetFormDataAction;
use App\Actions\User\Form\SubmitAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\SubmitRequest;
use Illuminate\Http\JsonResponse;

class UserController extends Controller
{
    public function confirm(SubmitRequest $request, ConfirmAction $action)
    {
        return ($action)($request->validated());
    }

    public function getFormData(GetFormDataAction $action): JsonResponse
    {
        return ($action)();
    }

    public function update(SubmitRequest $request, ConfirmAction $action)
    {
        return ($action)($request->validated());
    }

    public function submit(SubmitAction $action)
    {
        return ($action)();
    }
}
