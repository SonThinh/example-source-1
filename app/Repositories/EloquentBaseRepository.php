<?php

namespace App\Repositories;

use App\Contracts\BaseRepository;
use Spatie\QueryBuilder\QueryBuilder;

abstract class EloquentBaseRepository extends \Prettus\Repository\Eloquent\BaseRepository implements BaseRepository
{
    protected $defaultSort = '-created_at';

    protected array $allowedFilters = [];

    protected array $defaultSelect = ['*'];

    protected array $allowedSorts = [];

    protected array $allowedIncludes = [];

    protected array $allowedFields = ['*'];

    public function queryBuilder(): self
    {
        $model = parent::makeModel();
        $this->model = QueryBuilder::for($model)
                                   ->select($this->defaultSelect)
                                   ->allowedFilters($this->allowedFilters)
                                   ->allowedFields($this->allowedFields)
                                   ->allowedIncludes($this->allowedIncludes)
                                   ->allowedSorts($this->allowedSorts)
                                   ->defaultSort($this->defaultSort);

        return $this;
    }

    public function paginateOrAll($limit = null, array $columns = ['*'], string $method = 'paginate')
    {
        if ($columns === null) {
            $columns = ['*'];
        }
        if (! empty($limit)) {
            return $this->paginate($limit, $columns, $method);
        }

        return $this->all($columns);
    }

    public function all($columns = ['*'])
    {
        $this->applyCriteria();
        $this->applyScope();
        $results = $this->model->get($columns);

        $this->resetModel();
        $this->resetScope();

        return $this->parserResult($results);
    }

    protected function addExtraFilters($filter)
    {
        $this->allowedFilters = array_merge($this->allowedFilters, $filter);
    }
}
