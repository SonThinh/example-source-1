<?php

namespace App\Actions\CMS\Auth;

use App\Contracts\AdminRepository;
use App\Supports\Traits\HasTransformer;
use App\Transformers\AdminTransformer;
use Illuminate\Http\JsonResponse;

class ProfileAction
{
    use HasTransformer;

    protected AdminRepository $adminRepository;

    public function __construct(AdminRepository $adminRepository)
    {
        $this->adminRepository = $adminRepository;
    }

    public function __invoke(): JsonResponse
    {
        $currentAdmin = auth('admin')->user();

        return $this->httpOK($currentAdmin, AdminTransformer::class);
    }
}
