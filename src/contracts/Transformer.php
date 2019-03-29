<?php

namespace Samark\Contracts;

use League\Fractal\Scope;
use League\Fractal\Resource\Primitive;

/**
 * Class Transformer
 * @package App\Contracts
 * @author samark chisanguan <samarkchsngn@gmail.com>
 */
abstract class Transformer extends \League\Fractal\TransformerAbstract
{
    /**
     * @var array
     */
    private $includesName = [];

    /**
     * @param array $includesName
     * @return $this
     */
    public function setIncludesName(array $includesName)
    {
        $this->includesName = array_merge($this->includesName, $includesName);
        return $this;
    }

    /**
     * @return array
     */
    public function getIncludesName()
    {
        return $this->includesName;
    }

    /**
     * @param \League\Fractal\Scope $scope
     * @param $data
     * @return array|bool
     */
    public function processIncludedResources(Scope $scope, $data)
    {
        $includedData = [];

        $includes = $this->resolveFigureOutWhichIncludes($scope);

        foreach ($includes as $include) {
            $includedData = $this->resolveIncludeResourceIfAvailable(
                $scope,
                $data,
                $includedData,
                $include
            );
        }

        return $includedData === [] ? false : $includedData;
    }

    /**
     * @param \League\Fractal\Scope $scope
     * @param $data
     * @param $includedData
     * @param $include
     * @return mixed
     */
    private function resolveIncludeResourceIfAvailable(
        Scope $scope,
        $data,
        $includedData,
        $include
    )
    {
        if ($resource = $this->callIncludeMethod($scope, $include, $data)) {
            $childScope = $scope->embedChildScope($include, $resource);
            $include    = array_get($this->getIncludesName(), $include, $include);
            if ($childScope->getResource() instanceof Primitive) {
                $includedData[$include] = $childScope->transformPrimitiveResource();
            } else {
                $includedData[$include] = $childScope->toArray();
            }
        }

        return $includedData;
    }

    /**
     * @param \League\Fractal\Scope $scope
     * @return array
     */
    private function resolveFigureOutWhichIncludes(Scope $scope)
    {
        $includes = $this->getDefaultIncludes();

        foreach ($this->getAvailableIncludes() as $include) {
            if ($scope->isRequested($include)) {
                $includes[] = $include;
            }
        }

        foreach ($includes as $include) {
            if ($scope->isExcluded($include)) {
                $includes = array_diff($includes, [$include]);
            }
        }

        return $includes;
    }
}
