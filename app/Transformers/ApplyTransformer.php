<?php

namespace App\Transformers;

use App\Models\Apply;
use Flugg\Responder\Transformers\Transformer;

class ApplyTransformer extends Transformer
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
     * @param \App\Models\Apply $apply
     * @return array
     */
    public function transform(Apply $apply)
    {
        return $apply->toArray();
    }
}
