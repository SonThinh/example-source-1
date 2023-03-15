<?php

namespace App\Supports\Traits;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\JsonResponse;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Tymon\JWTAuth\Exceptions\TokenExpiredException;

trait HandleErrorException
{
    /**
     * @param \Illuminate\Validation\ValidationException $exception
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function renderApiResponse(ValidationException $exception): JsonResponse
    {
        return response()->json([
            'status'  => JsonResponse::HTTP_UNPROCESSABLE_ENTITY,
            'message' => trans('status.validation'),
            'errors'  => $this->convertApiErrors($exception->errors()),
        ], JsonResponse::HTTP_UNPROCESSABLE_ENTITY);
    }

    /**
     * @param $errors
     *
     * @return array
     */
    private function convertApiErrors($errors)
    {
        $result = [];
        foreach ($errors as $k => $error) {
            $result[] = [
                'field'   => $k,
                'message' => $error,
            ];
        }

        return $result;
    }

    public function renderApiNotFoundResponse(NotFoundHttpException $exception): JsonResponse
    {
        return response()->json([
            'status'  => JsonResponse::HTTP_NOT_FOUND,
            'message' => trans('status.not_found'),
            'errors'  => $exception->getMessage(),
        ], JsonResponse::HTTP_NOT_FOUND);
    }

    /**
     * @param \Tymon\JWTAuth\Exceptions\TokenExpiredException $exception
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function renderExpiredException(TokenExpiredException $exception): JsonResponse
    {
        return response()->json([
            'status'  => JsonResponse::HTTP_REQUEST_TIMEOUT,
            'message' => trans('status.time_expired'),
            'errors'  => trans('auth.expired'),
        ], JsonResponse::HTTP_REQUEST_TIMEOUT);
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function renderNotLoginException(): JsonResponse
    {
        return response()->json([
            'status'  => JsonResponse::HTTP_NOT_FOUND,
            'message' => trans('auth.auth'),
            'errors'  => trans('status.not_login'),
        ], JsonResponse::HTTP_NOT_FOUND);
    }

    /**
     * @param \Symfony\Component\HttpKernel\Exception\BadRequestHttpException $exception
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function renderApiBadRequestResponse($exception): JsonResponse
    {
        return response()->json([
            'status'  => JsonResponse::HTTP_BAD_REQUEST,
            'message' => trans('status.bad_request'),
            'errors'  => $exception->getMessage(),
        ], JsonResponse::HTTP_BAD_REQUEST);
    }

    /**
     * Response server error exception
     *
     * @param $exception
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function renderServerErrorException($exception): JsonResponse
    {
        return response()->json([
            'status'  => JsonResponse::HTTP_INTERNAL_SERVER_ERROR,
            'message' => null,
            'errors'  => $exception->getMessage(),
        ], JsonResponse::HTTP_INTERNAL_SERVER_ERROR);
    }

    /**
     * @param $exception
     *
     * @return JsonResponse
     */
    public function renderForbiddenException($exception): JsonResponse
    {
        return response()->json([
            'status'  => JsonResponse::HTTP_FORBIDDEN,
            'message' => __('custom.authorization'),
        ], JsonResponse::HTTP_FORBIDDEN);
    }

    /**
     * Response unauthenticated
     *
     * @param $exception
     * @return \Illuminate\Http\JsonResponse
     */
    public function renderUnauthenticatedException($exception): JsonResponse
    {
        return response()->json([
            'status'  => JsonResponse::HTTP_UNAUTHORIZED,
            'message' => trans('custom.unauthenticated'),
            'errors'  => 'unauthenticated',
        ], JsonResponse::HTTP_UNAUTHORIZED);
    }

    /**
     * @param \Illuminate\Database\Eloquent\ModelNotFoundException $exception
     * @return \Illuminate\Http\JsonResponse
     */
    public function renderApiModelNotFoundResponse(ModelNotFoundException $exception): JsonResponse
    {
        return response()->json([
            'status'  => JsonResponse::HTTP_NOT_FOUND,
            'message' => null,
            'errors'  => null,
        ], JsonResponse::HTTP_NOT_FOUND);
    }
}
