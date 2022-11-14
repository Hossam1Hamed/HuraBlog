<?php   

namespace App\Repositories;

use App\Interfaces\BaseRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;


class BaseRepository implements BaseRepositoryInterface 
{
    protected $model; 

    public function __construct(Model $model)     
    {         
        $this->model = $model;
    }

    public function create(array $attributes): Model
    {
        $data = $this->model->create($attributes);
        return $data;
    }

    public function update(array $attributes, $id)
    {
        $model = $this->model->find($id);
        $data = $model->update($attributes);
        return $data;
    }

    public function find($id): ?Model
    {
        $model = $this->model->find($id);
        return $this->model->find($id);
    }

    public function all(): Collection
    {
        return $this->model->all();
    }

    public function destroy($id)
    {
        $model = $this->model->find($id);
        return $model->delete();
    }

    public function allWithPaginate($number = 15){
        return $this->model->paginate($number);
    }
}
