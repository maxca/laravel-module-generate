<?php

namespace Samark\ModuleGenerate\Contracts;

/**
 * Class Blueprint
 *
 * @package App\Contracts
 */
class Blueprint extends \Illuminate\Database\Schema\Blueprint
{
    /**
     * Add creation and update timestamps with defaults to the table.
     *
     * @return void
     */
    public function timestamp($column, $precision = 0)
    {
        return $this->addColumn('dateTime', $column, compact('precision'));
    }
}
