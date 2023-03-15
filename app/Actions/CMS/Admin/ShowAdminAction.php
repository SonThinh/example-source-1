<?php

namespace App\Actions\CMS\Admin;

use App\Contracts\AdminRepository;
use App\Supports\Traits\HasTransformer;
use App\Transformers\AdminTransformer;
use Illuminate\Http\JsonResponse;

class ShowAdminAction
{
    use HasTransformer;

    private AdminRepository $adminRepository;

    public function __construct(AdminRepository $repository)
    {
        $this->adminRepository = $repository;
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function __invoke(int $id): JsonResponse
    {
        $admin = $this->adminRepository->find($id);

        return $this->httpOK($admin, AdminTransformer::class);
    }
}
