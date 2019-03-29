<?php

namespace App\Criterias;

use Prettus\Repository\Contracts\CriteriaInterface;

/**
 * Class ScopeOutletCriteria
 * @package Prettus\Repository\Criteria
 */
class WhereDateRangeCriteria implements CriteriaInterface
{
    /**
     * @var string
     */
    private $column;

    /**
     * @var datetime
     */
    private $startDate;

    /**
     * @var datetime
     */
    private $endDate;

    /**
     * WhereDateRangeCriteria constructor.
     * @param $column
     * @param $startDate
     * @param $endDate
     */
    public function __construct($column, $startDate, $endDate)
    {
        $this->column    = $column;
        $this->startDate = $startDate;
        $this->endDate   = $endDate;
    }

    /**
     * Apply criteria in query repository
     * @param         Builder|Model $model
     * @param RepositoryInterface $repository
     * @return mixed
     * @throws \Exception
     */
    public function apply($model)
    {
        return $model->whereBetween($this->column, [$this->startDate, $this->endDate]);
    }
}
