<?php

namespace Samark\ModuleGenerate\Criteria;

use Prettus\Repository\Contracts\CriteriaInterface;
use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * Class ScopeOutletCriteria
 * @package Prettus\Repository\Criteria
 */
class DateRangeCriteria implements CriteriaInterface
{

    /**
     * @var string
     */
    private $startDate;

    /**
     * @var string
     */
    private $endDate;

    /**
     * OutletCriteria constructor.
     * @param $startDate
     * @param $endDate
     */
    public function __construct($startDate, $endDate)
    {
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
    public function apply($model, RepositoryInterface $repository)
    {
        return $model->whereBetween('created_at', [$this->startDate, $this->endDate]);
    }
}
