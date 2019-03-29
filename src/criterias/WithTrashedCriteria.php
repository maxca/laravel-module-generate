<?php

namespace App\Criterias;

use Prettus\Repository\Contracts\CriteriaInterface;
use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * Class WithTrashedCriteria
 * @package Prettus\Repository\Criteria
 */
class WithTrashedCriteria implements CriteriaInterface
{
    /**
     * @param $model
     * @return mixed
     */
    public function apply($model)
    {
        return $model->withTrashed();
    }
}
