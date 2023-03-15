<?php

namespace App\Actions\CMS\Auth;

use App\Supports\Traits\HasTransformer;
use Illuminate\Http\JsonResponse;

class LogoutAction
{
    use HasTransformer;

    public function __invoke(): JsonResponse
    {
        $admin = auth('admin')->user();
        $admin->currentAccessToken()->delete();

        return $this->httpNoContent();
    }
}
