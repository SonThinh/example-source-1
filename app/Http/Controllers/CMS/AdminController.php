<?php

namespace App\Http\Controllers\CMS;

use App\Actions\CMS\Admin\DeleteAdminAction;
use App\Actions\CMS\Admin\IndexAdminAction;
use App\Actions\CMS\Admin\ShowAdminAction;
use App\Actions\CMS\Admin\StoreAdminAction;
use App\Actions\CMS\Admin\UpdateAdminAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreAdminRequest;
use App\Http\Requests\UpdateAdminRequest;
use Illuminate\Http\JsonResponse;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param \App\Actions\CMS\Admin\IndexAdminAction $action
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(IndexAdminAction $action): JsonResponse
    {
        return ($action)();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \App\Http\Requests\StoreAdminRequest $request
     * @param \App\Actions\CMS\Admin\StoreAdminAction $action
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(StoreAdminRequest $request, StoreAdminAction $action): JsonResponse
    {
        return ($action)($request->validated());
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @param \App\Actions\CMS\Admin\ShowAdminAction $action
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(int $id, ShowAdminAction $action): JsonResponse
    {
        return ($action)($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \App\Http\Requests\UpdateAdminRequest $request
     * @param int $id
     * @param \App\Actions\CMS\Admin\UpdateAdminAction $action
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(UpdateAdminRequest $request, int $id, UpdateAdminAction $action): JsonResponse
    {
        return ($action)($request->validated(), $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @param \App\Actions\CMS\Admin\DeleteAdminAction $action
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(int $id, DeleteAdminAction $action): JsonResponse
    {
        return ($action)($id);
    }
}
