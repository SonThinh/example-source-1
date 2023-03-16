<?php

namespace App\Repositories;

use App\Contracts\QuestionRepository;
use App\Enums\QuestionTypeEnum;
use App\Models\Question;
use Illuminate\Container\Container as Application;

class EloquentQuestionRepository extends EloquentBaseRepository implements QuestionRepository
{
    public function __construct(Application $app)
    {
        parent::__construct($app);

        $this->addExtraFilters([

        ]);

        $this->defaultSort = 'order';
    }

    public function model(): string
    {
        return Question::class;
    }
}
