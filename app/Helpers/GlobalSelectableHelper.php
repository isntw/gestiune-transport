<?php

use App\CostCategory;

if (!function_exists('selectableUsers')) {

    /**
     * description
     *
     * @param
     * @return
     */
    function selectableCostCategory() {
        return CostCategory::get();
    }

}