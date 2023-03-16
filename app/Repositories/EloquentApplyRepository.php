<?php

namespace App\Repositories;

use App\Contracts\ApplyRepository;
use App\Models\Apply;
use Illuminate\Container\Container as Application;
use Spatie\QueryBuilder\AllowedFilter;

class EloquentApplyRepository extends EloquentBaseRepository implements ApplyRepository
{
    public function model(): string
    {
        return Apply::class;
    }

    public function __construct(Application $app)
    {
        parent::__construct($app);

        $this->addExtraFilters([
            'id',
            AllowedFilter::scope('apply_date_start'),
            AllowedFilter::scope('apply_date_end'),
        ]);
    }
}
