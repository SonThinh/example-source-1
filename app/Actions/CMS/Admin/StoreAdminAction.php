<?php

namespace App\Actions\CMS\Admin;

use App\Contracts\AdminRepository;
use App\Supports\Traits\HasTransformer;
use App\Transformers\AdminTransformer;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;

class StoreAdminAction
{
    use HasTransformer;

    private AdminRepository $adminRepository;

    public function __construct(AdminRepository $repository)
    {
        $this->adminRepository = $repository;
    }

    /**
     * @param array $data
     * @return \Illuminate\Http\JsonResponse
     */
    public function __invoke(array $data): JsonResponse
    {
        return DB::transaction(function () use ($data) {
            $admin = $this->adminRepository->create(array_merge($data, ['is_valid' => $data['status']]));

            $admin->assignRole($data['role']);

            return $this->httpOK($admin, AdminTransformer::class);
        });
    }
}
