<?php

namespace App\Repositories;

use App\Models\KategoriKonseling;
use App\Models\Todo;
use App\Repositories\TodoRepositoryInterface;
use Illuminate\Http\Request;

class TodoRepository implements TodoRepositoryInterface
{
    /**
     * @var App\Models\Todo
     */
    protected $model;

    /**
     * Constructor.
     *
     * @param Todo $model
     */
    // public function __construct(Todo $model)
    // {
    //     $this->model = $model;
    // }

    public function __construct(KategoriKonseling $model)
    {
        $this->model = $model;
    }

    /**
     * @inheritDoc
     */
    public function all()
    {
        return $this->model->all();
    }

    /**
     * @inheritDoc
     */
    public function store(array $data)
    {
        $this->model->create($data);
    }

    /**
     * @inheritDoc
     */
    public function delete($id)
    {
        $todo = $this->model->findOrFail($id);

        return $todo->delete();
    }

    /**
     * @inheritDoc
     */
    public function update(array $data, $id)
    {
        $todo = $this->model->findOrFail($id);

        return $todo->update($data);
    }
}
