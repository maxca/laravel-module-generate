<?php

namespace Samark\ModuleGenerate\Criteria;

use Prettus\Repository\Contracts\CriteriaInterface;
use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * Class ScopeOutletCriteria
 * @package Prettus\Repository\Criteria
 */
class WhereDateCriteria implements CriteriaInterface
{
    private $column;

    private $date;

    public function __construct($column, $date)
    {
        $this->column = $column;

        $this->date = $date;
    }

    /**
     * Apply criteria in query repository
     *
     * @param         Builder|Model     $model
     * @param RepositoryInterface $repository
     *
     * @return mixed
     * @throws \Exception
     */
    public function apply($model, RepositoryInterface $repository)
    {
        return $model->whereDate($this->column, $this->date);
    }
}
