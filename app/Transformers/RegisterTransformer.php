<?php

namespace App\Transformers;

use App\Models\User;
use Flugg\Responder\Transformers\Transformer;
use Tymon\JWTAuth\Facades\JWTAuth;

class RegisterTransformer extends Transformer
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
     * @param \App\Models\User $user
     * @return array
     */
    public function transform(User $user)
    {
        $expiredTime = now()->addDays(7);

        return array_merge($user->toArray(), [
            'token'      => JWTAuth::customClaims(['exp' => $expiredTime->timestamp,])->fromUser($user),
            'expired_at' => $expiredTime->format('Y-m-d H:i:s'),
        ]);
    }
}
