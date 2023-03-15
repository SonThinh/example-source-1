<?php

namespace App\Repositories;

use App\Contracts\AdminRepository;
use App\Models\Admin;
use Illuminate\Container\Container as Application;
use Spatie\QueryBuilder\AllowedFilter;

class EloquentAdminRepository extends EloquentBaseRepository implements AdminRepository
{
    public function model(): string
    {
        return Admin::class;
    }

    public function __construct(Application $app)
    {
        parent::__construct($app);

        $this->addExtraFilters([
            'login_id',
            'name',
            AllowedFilter::scope('role'),
            AllowedFilter::scope('status'),
        ]);
    }
}
