<?php

namespace App\Actions\CMS\Auth;

use App\Contracts\AdminRepository;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Hash;

class LoginAction
{
    private AdminRepository $adminRepository;

    public function __construct(AdminRepository $repository)
    {
        $this->adminRepository = $repository;
    }

    /**
     * @param array $data
     * @return \Illuminate\Http\JsonResponse
     * @throws \Illuminate\Auth\AuthenticationException
     */
    public function __invoke(array $data): JsonResponse
    {
        $admin = $this->adminRepository->firstWhere([
            'login_id' => $data['login_id'],
            'is_valid' => true,
        ]);
       
        if ($admin && Hash::check($data['password'], $admin->password)) {
            $tokenObj = $admin->createToken('admin-token');

            return response()->json([
                'token' => $tokenObj->plainTextToken,
                'type'  => 'Bearer',
            ]);
        }

        throw new AuthenticationException(__('custom.incorrect_login_info'));
    }
}
