<?php

namespace App\Transformers;

use App\Models\Question;
use Flugg\Responder\Transformers\Transformer;

class QuestionTransformer extends Transformer
{
    /**
     * List of available relations.
     *
     * @var string[]
     */
    protected $relations = [];

    /**
     * List of autoloaded default relations.
     *
     * @var array
     */
    protected $load = [];

    /**
     * Transform the model.
     *
     * @param \App\Models\Question $question
     * @return array
     */
    public function transform(Question $question)
    {
        return $question->toArray();
    }
}
