<?php

namespace App\Actions\User\Form;

use App\Contracts\ApplyRepository;
use App\Contracts\QuestionRepository;
use App\Contracts\UserRepository;
use App\Supports\Traits\HasTransformer;
use App\Transformers\ApplyTransformer;
use Carbon\Carbon;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;

class SubmitAction
{
    use HasTransformer;

    protected UserRepository $userRepository;

    protected ApplyRepository $applyRepository;

    protected QuestionRepository $questionRepository;

    public function __construct(
        UserRepository $userRepository,
        ApplyRepository $applyRepository,
        QuestionRepository $questionRepository
    ) {
        $this->userRepository = $userRepository;
        $this->applyRepository = $applyRepository;
        $this->questionRepository = $questionRepository;
    }

    public function __invoke()
    {
        $user = auth('user')->user();

        if (Arr::get($user->user_data, 'can_edit') === 0) {
            return $this->httpBadRequest(trans('custom.had_completed'));
        }

        return DB::transaction(function () use ($user) {
            $data = [];
            foreach (Arr::get($user->user_data, 'question') as $id => $answer) {
                $question = $this->questionRepository->find($id);
                if (! Arr::has($question->options, 'key')) {
                    continue;
                }

                $value = is_array($answer['value']) ?
                    ((Arr::get($question->options, 'key') == 'birthday') ?
                        Carbon::parse(implode('', $answer['value']))->format('Ymd') :
                        implode(' ', $answer['value'])) :
                    $answer['value'];
                $data['data'][$question->options['key']] = $value;
            }
dd($data);
            $data['user_id'] = $user->id;
            $data['apply_date'] = now();
            $apply = $this->applyRepository->create($data);
            $this->userRepository->update([
                'user_data' => array_merge($user->user_data, ['can_edit' => 0]),
            ], $user->id);

            return $this->httpCreated($apply, ApplyTransformer::class);
        });
    }
}
