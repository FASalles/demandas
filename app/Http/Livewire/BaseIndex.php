<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;

abstract class BaseIndex extends Component
{
    use WithPagination;

    protected $model;
    protected $repository;
    protected $paginationTheme = 'bootstrap';
    public $searchString = '';
    public $pageSize = 10;
    protected $refreshFields = ['searchString'];
    protected $paginationEnabled = true;

    protected $listeners = ['update-field' => 'updateField'];

    public function checkResetPage($field)
    {
        collect($this->refreshFields)->each(function ($refreshField) use ($field) {
            if ($field == $refreshField) {
                $this->resetPage();
            }
        });
    }

    public function updateField($event)
    {
        $field = $event['field'];
        $this->{$field} = $event['value'];

        if ($this->paginationEnabled) {
            $this->checkResetPage($field);
        }
    }

    public function updating($field)
    {
        if ($this->paginationEnabled) {
            $this->checkResetPage($field);
        }
    }

    public $searchFields = [];

    public function additionalFilterQuery($query)
    {
        return $query;
    }

    protected $orderByField = 'updated_at';
    protected $orderByDirection = 'desc';

    public function orderBy($query)
    {
        return $query->orderBy($this->orderByField, $this->orderByDirection);
    }

    public function filter()
    {
        $repository = app($this->repository);

        if (!$this->paginationEnabled) {
            $repository->disablePagination();
        }

        $query = $this->model::query();

        $query = $repository
            //->newQuery()
            ->where(function ($query) {
                collect($this->searchFields)->each(function ($key, $field) use ($query) {
                    switch ($key) {
                        case 'text':
                            dd('oi');
                            $query->when($this->searchString, function ($query) use ($field) {
                                $query->orWhereRaw(
                                    'unaccent(' .
                                    $field .
                                    ") ILIKE '%'||unaccent('" .
                                    pg_escape_string($this->searchString) .
                                    "')||'%' "
                                );
                            });
                            break;
                        case 'date':
                            $query->when($this->searchString, function ($query) use ($field) {
                                $query->orWhereRaw(
                                    'to_char(' .
                                    $field .
                                    ", 'DD/MM/YYYY HH:MI') LIKE '%" .
                                    $this->searchString .
                                    "%'"
                                );
                            });
                            break;
                    }
                });
            });

        $query = $this->additionalFilterQuery($query);

        $query = $this->orderBy($query);

        return $this->paginationEnabled ? $query->paginate($this->pageSize) : $query->get();
    }
}