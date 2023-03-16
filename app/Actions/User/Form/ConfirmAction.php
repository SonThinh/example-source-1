<?php

namespace App\Actions\User\Form;

use App\Contracts\QuestionRepository;
use App\Contracts\UserRepository;
use App\Supports\Services\UploadFileService;
use App\Supports\Traits\HasTransformer;
use App\Transformers\RegisterTransformer;
use App\Transformers\UserTransformer;

class ConfirmAction
{
    use HasTransformer;

    protected UserRepository $userRepository;

    protected QuestionRepository $questionRepository;

    protected UploadFileService $uploadFileService;

    public function __construct(
        UserRepository $userRepository,
        QuestionRepository $questionRepository,
        UploadFileService $uploadFileService
    ) {
        $this->userRepository = $userRepository;
        $this->questionRepository = $questionRepository;
        $this->uploadFileService = $uploadFileService;
    }

    public function __invoke($data)
    {
        $user = auth('user')->user();

        if (! empty($user)) {
            $user = $this->userRepository->update([
                'user_data' => $data,
            ], $user->id);

            return $this->httpOK($user, UserTransformer::class);
        }

        $user = $this->userRepository->create([
            'user_data' => $data,
        ]);

        return $this->httpOK($user, RegisterTransformer::class);
    }
}
