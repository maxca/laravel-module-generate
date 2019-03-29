<?php

namespace App\Criterias;

use Prettus\Repository\Contracts\CriteriaInterface;
use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * Class FindByFieldCriteria
 * @package Prettus\Repository\Criteria
 */
class FindByFieldCriteria implements CriteriaInterface
{
    /**
     * @var
     */
    private $field;

    /**
     * @var string
     */
    private $operator = '=';

    /**
     * @var
     */
    private $value;

    /**
     * FindByFieldCriteria constructor.
     * @param $field
     * @param $operator
     * @param null $value
     */
    public function __construct($field, $operator, $value = null)
    {
        $this->field = $field;
        if ($value != null) {
            $this->operator = $operator;
            $this->value = $value;
        } else {
            $this->value = $operator;
        }
    }

    /**
     * @param $model
     * @param \Prettus\Repository\Contracts\RepositoryInterface $repository
     * @return mixed
     */
    public function apply($model, RepositoryInterface $repository)
    {
        return $model->where($this->field, $this->operator, $this->value);
    }
}
