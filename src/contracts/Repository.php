<?php

namespace Samark\Contracts;

use Prettus\Repository\Contracts\CacheableInterface;
use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Traits\CacheableRepository;
use Prettus\Repository\Events\RepositoryEntityDeleted;
use Prettus\Repository\Events\RepositoryEntityUpdated;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Request;
use Samark\Criterias\RequestCriteria;

/**
 * Class Repository
 * @package App\Contracts
 * @author samark chisanguan <samarkchsngn@gmail.com>
 */
abstract class Repository extends BaseRepository implements CacheableInterface
{
    use CacheableRepository;

    /**
     * @var int
     */
    protected $limit = 30;

    /**
     * @return mixed
     */
    public function toSql()
    {
        $this->applyCriteria();
        $this->applyScope();
        return $this->model->toSql();
    }

    /**
     * @param array $attributes
     * @param $id
     * @return mixed
     */
    public function update(array $attributes, $id)
    {
        $this->applyScope();
        $temporarySkipPresenter = $this->skipPresenter;
        $this->skipPresenter(true);
        $model = $this->model->findOrFail($id);
        $model->update($attributes);
        $this->skipPresenter($temporarySkipPresenter);
        $this->resetModel();
        event(new RepositoryEntityUpdated($this, $model));
        return $this->parserResult($model);
    }

    /**
     * @param $id
     * @return mixed
     */
    public function delete($id)
    {
        $this->applyScope();
        $temporarySkipPresenter = $this->skipPresenter;
        $this->skipPresenter(true);
        $model         = $this->model->findOrFail($id);
        $originalModel = clone $model;
        $this->skipPresenter($temporarySkipPresenter);
        $this->resetModel();
        $deleted = $model->delete();
        event(new RepositoryEntityDeleted($this, $originalModel));
        return $deleted;
    }

    /**
     * @param $id
     * @param $relation
     * @return mixed
     * @throws \Throwable
     */
    public function deleteAndDetach($id, $relation)
    {
        $deleted = DB::transaction(function () use ($id, $relation) {
            $this->applyScope();
            $temporarySkipPresenter = $this->skipPresenter;
            $this->skipPresenter(true);
            $model = $this->model->findOrFail($id);
            $originalModel = clone $model;
            $this->skipPresenter($temporarySkipPresenter);
            $this->resetModel();
            $deleted = $model->delete();
            $originalModel->{$relation}()->detach();
            event(new RepositoryEntityDeleted($this, $originalModel));
            return $deleted;
        }, 3);

        return $deleted;
    }

    /**
     * @param $id
     * @param $relations
     * @return mixed
     * @throws \Throwable
     */
    public function deleteAndDetaches($id, $relations)
    {
        $deleted = DB::transaction(function () use ($id, $relations) {
            $this->applyScope();
            $temporarySkipPresenter = $this->skipPresenter;
            $this->skipPresenter(true);
            $model = $this->model->findOrFail($id);
            $originalModel = clone $model;
            $this->skipPresenter($temporarySkipPresenter);
            $this->resetModel();
            $deleted = $model->delete();
            foreach ($relations as $relation) {
                $originalModel->{$relation}()->detach();
            }
            event(new RepositoryEntityDeleted($this, $originalModel));
            return $deleted;
        }, 3);

        return $deleted;
    }

    /**
     * booting repository
     */
    public function boot()
    {
        $this->pushCriteria(new RequestCriteria());
    }

    /**
     * @param null $limit
     * @param array $columns
     * @param string $method
     * @return mixed
     */
    public function paginate($limit = null, $columns = ['*'], $method = "paginate")
    {
        $limit = Request::get('limit') ?? $this->limit;
        return parent::paginate($limit, $columns, $method);
    }
}
