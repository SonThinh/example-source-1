<?php

namespace App\Actions\CMS\Admin;

use App\Contracts\AdminRepository;
use App\Supports\Traits\HasPerPageRequest;
use App\Supports\Traits\HasTransformer;
use App\Transformers\AdminTransformer;
use Illuminate\Http\JsonResponse;

class IndexAdminAction
{
    use HasTransformer, HasPerPageRequest;

    private AdminRepository $adminRepository;

    public function __construct(AdminRepository $repository)
    {
        $this->adminRepository = $repository;
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function __invoke(): JsonResponse
    {
        $admins = $this->adminRepository->queryBuilder();

        return $this->httpOK($admins->paginate($this->getPerPage()), AdminTransformer::class);
    }
}
