<?php

namespace App\Actions\User\Question;

use App\Contracts\QuestionRepository;
use App\Supports\Traits\HasTransformer;
use App\Transformers\QuestionTransformer;
use Illuminate\Http\JsonResponse;

class IndexQuestionAction
{
    use HasTransformer;

    protected QuestionRepository $questionRepository;

    public function __construct(QuestionRepository $questionRepository)
    {
        $this->questionRepository = $questionRepository;
    }

    public function __invoke(): JsonResponse
    {
        $questions = $this->questionRepository->queryBuilder()->get();

        return $this->httpOK($questions, QuestionTransformer::class);
    }
}
