<?php

namespace App\Http\Controllers\User;

use App\Actions\User\Question\IndexQuestionAction;
use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;

class QuestionController extends Controller
{
    /**
     * @param \App\Actions\User\Question\IndexQuestionAction $action
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(IndexQuestionAction $action): JsonResponse
    {
        return ($action)();
    }
}
