<?php

namespace App\Actions\User\Form;

use App\Contracts\QuestionRepository;
use App\Contracts\UserRepository;
use App\Supports\Traits\HasTransformer;
use App\Transformers\UserTransformer;
use Illuminate\Support\Arr;

class GetFormDataAction
{
    use HasTransformer;

    protected QuestionRepository $questionRepository;

    protected UserRepository $userRepository;

    public function __construct(QuestionRepository $questionRepository, UserRepository $userRepository)
    {
        $this->questionRepository = $questionRepository;
        $this->userRepository = $userRepository;
    }

    public function __invoke()
    {
        // get user data
        $userId = auth('user')->user()->id;
        $user = $this->userRepository->find($userId);
        if (Arr::get($user->user_data, 'can_edit') === 0) {
            return $this->httpOK(['applied' => 1]);
        }

        return $this->httpOK($user, UserTransformer::class);
    }
}
