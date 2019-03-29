<?php

namespace App\Criterias;

use Prettus\Repository\Contracts\CriteriaInterface;
use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * Class OnlyTrashedCriteria
 * @package Prettus\Repository\Criteria
 */
class OnlyTrashedCriteria implements CriteriaInterface
{
    public function apply($model, RepositoryInterface $repository)
    {
        return $model->onlyTrashed();
    }
}
