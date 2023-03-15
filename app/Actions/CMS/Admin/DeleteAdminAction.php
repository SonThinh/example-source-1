<?php

namespace App\Actions\CMS\Admin;

use App\Contracts\AdminRepository;
use App\Supports\Traits\HasTransformer;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;

class DeleteAdminAction
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
        $currentUser = auth()->user();
        $userWillBeDeleted = $this->adminRepository->find($id);

        if (($currentUser !== null && $id == $currentUser->id) || $userWillBeDeleted->id === 1) {
            throw new BadRequestHttpException;
        }

        if ($this->adminRepository->delete($id)) {
            return $this->httpNoContent();
        }

        throw new BadRequestHttpException;
    }
}
