<?php

namespace App\Http\Requests;

use App\Enums\QuestionTypeEnum;
use App\Models\Question;
use App\Rules\Address;
use App\Rules\Birthday;
use App\Rules\Checkbox;
use App\Rules\Email;
use App\Rules\Input;
use App\Rules\PullDown;
use App\Rules\Split;

class SubmitRequest extends BaseRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return $this->getListRuleInThisQuestion();
    }

    protected function getListRuleInThisQuestion(): array
    {
        $dataRule = [];
        $questions = Question::all();
        $dataQuestions = $this->all('question')['question'];
        foreach ($questions as $questionItem) {
            if (QuestionTypeEnum::isGroupInput($questionItem->type)) {
                $dataRule += Input::rule($questionItem, $dataQuestions);
            } elseif (QuestionTypeEnum::isGroupSplit($questionItem->type)) {
                $dataRule += Split::rule($questionItem, $dataQuestions);
            } elseif ($questionItem->type == QuestionTypeEnum::ADDRESS) {
                $dataRule += Address::rule($questionItem, $dataQuestions);
            } elseif (QuestionTypeEnum::isGroupTypePullDown($questionItem->type)) {
                $dataRule += PullDown::rule($questionItem, $dataQuestions);
            } elseif ($questionItem->type == QuestionTypeEnum::EMAIL) {
                $dataRule += Email::rule($questionItem, $dataQuestions);
            } elseif ($questionItem->type == QuestionTypeEnum::BIRTHDAY) {
                $dataRule += Birthday::rule($questionItem, $dataQuestions);
            }
        }

        return $dataRule;
    }
}
