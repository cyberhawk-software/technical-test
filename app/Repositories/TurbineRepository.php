<?php

namespace App\Repositories;

use App\Models\Turbine;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\DB;

class TurbineRepository
{
    protected Turbine $model;

    public function __construct(Turbine $model)
    {
        $this->model = $model;
    }

    /**
     * @param $id
     * @return mixed
     * @throws ModelNotFoundException
     */
    public function read($id): mixed
    {
        return $this->model->with(['components'])->findOrFail($id);
    }

    /**
     * @param array $filters
     * @param string $orderBy
     * @param string $sortBy
     * @param int $limit
     * @return mixed
     */
    public function allFiltered(
        array $filters,
        string $orderBy,
        string $sortBy,
        int $limit
    ): mixed
    {
        return $this->withFilters($filters)
            ->with(['components'])
            ->orderBy($orderBy, $sortBy)
            ->paginate($limit);
    }

    /**
     * @param Turbine $model
     * @param array $data
     * @return Turbine
     */
    public function update(Turbine $model, array $data): Turbine
    {
        $model->fill($data);
        $model->save();
        return $model;
    }

    public function startTransaction(): void
    {
        DB::beginTransaction();
    }

    public function commitTransaction(): void
    {
        DB::commit();
    }

    public function rollbackTransaction(): void
    {
        DB::rollBack();
    }

    public function getAvailableFilters(): array
    {
        return $this->model->getAvailableFilters(false);
    }

    public function withFilters($filters)
    {
        $model_filters = collect($this->model->getAvailableFilters());
        $available_filters = $model_filters->keys()->toArray();
        $type_model_filters = $model_filters->toArray();

        $use_filters = collect($filters)->keys()->filter(function ($item) use ($available_filters) {
            return in_array($item, $available_filters);
        });

        return $use_filters->reduce(function ($model, $column) use ($filters, $type_model_filters) {
            $string_filters = ['equal-relation', 'like-relation', 'like'];
            $column_name = $this->model->getTable() . '.' . $column;
            $type_model_filter = $type_model_filters[$column]['type'];

            if (is_string($filters[$column]) && in_array($type_model_filter, $string_filters)) {
                if ($type_model_filter === 'equal-relation') {
                    return $model->wherePivot(
                        $type_model_filters[$column]['field'],
                        $filters[$column]
                    );
                }

                if ($type_model_filter === 'like') {
                    return $model->where($column_name, 'LIKE', '%' . $filters[$column] . '%');
                }

                if ($type_model_filter === 'like-relation') {
                    return $model->whereRelation(
                        $type_model_filters[$column]['relation'],
                        $type_model_filters[$column]['field'],
                        'LIKE',
                        $filters[$column] . '%'
                    );
                }
            }

            return $model;
        }, $this->model);
    }
}
