<?php

namespace App\Services;

use App\Http\Requests\TurbineRequest;
use App\Models\Turbine;
use App\Repositories\TurbineRepository;
use Exception;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Validator;
use InvalidArgumentException;

class TurbineService
{
    protected TurbineRepository $repository;
    protected TurbineRequest $request;

    public function __construct(TurbineRepository $repository, TurbineRequest $request)
    {
        $this->repository = $repository;
        $this->request = $request;
    }

    public function allFiltered(
        $filters = [],
        string|null $orderBy = null,
        string|null $sortBy = null,
        $limit = 15
    ): array
    {
        return $this->customPaginate(
            $this->repository->allFiltered($filters, $orderBy, $sortBy, $limit),
            $this->repository->getAvailableFilters(),
            $filters
        );
    }

    public function read($id): Turbine
    {
        return $this->repository->read($id);
    }

    /**
     * @throws Exception
     */
    public function update($id, $data): Turbine
    {
        $validator = Validator::make(
            $data->all(),
            $this->request->rules()
        );

        if ($validator->fails()) {
            throw new InvalidArgumentException($validator->errors());
        }

        try {
            $this->repository->startTransaction();
            $model = $this->repository->read($id);
            $turbine = $this->repository->update($model, $data->all());

            if (count($data->components) > 0) {
                $turbine->components()->sync($data->components);
            }

            $this->repository->commitTransaction();
            $turbine->refresh();

            return $turbine;
        } catch (Exception $exception) {
            $this->repository->rollbackTransaction();
            throw $exception;
        }
    }

    protected function customPaginate(
        LengthAwarePaginator $data,
        array                $available_filters = [],
        array                $usedFilters = [],
        int|null             $eachSide = null
    ): array
    {
        if (!is_null($eachSide)) {
            $data->onEachSide($eachSide)->links();
        }

        $data = $data->toArray();
        $data['next_page_id'] = $data['current_page'] < $data['last_page']
            ? $data['current_page'] + 1
            : $data['current_page'];
        $data['prev_page_id'] = $data['current_page'] > 1 ? $data['current_page'] - 1 : null;

        if (!empty($available_filters)) {
            $data['available_filters'] = $available_filters;
        }

        if (!empty($usedFilters)) {
            $data['applied_filters'] = $usedFilters;
        }

        return $data;
    }
}
