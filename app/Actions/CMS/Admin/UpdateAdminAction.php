<?php

namespace App\Actions\CMS\Admin;

use App\Contracts\AdminRepository;
use App\Supports\Traits\HasTransformer;
use App\Transformers\AdminTransformer;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;

class UpdateAdminAction
{
    use HasTransformer;

    private AdminRepository $adminRepository;

    public function __construct(AdminRepository $repository)
    {
        $this->adminRepository = $repository;
    }

    /**
     * @param array $data
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function __invoke(array $data, int $id): JsonResponse
    {
        return DB::transaction(function () use ($id, $data) {
            $admin = $this->adminRepository->find($id);

            if ($id != 1) {
                $admin->syncRoles($data['role']);
                unset($data['role']);
                // Revoke all tokens to force re-login
                $admin->tokens()->delete();
                $data['is_valid'] = $data['status'];
            }

            $data['updated_at'] = now();
            unset($data['status']);
            $admin->update($data);
            $admin->refresh();

            return $this->httpOK($admin, AdminTransformer::class);
        });
    }
}
