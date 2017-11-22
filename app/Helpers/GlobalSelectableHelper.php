<?php

use App\CostCategory;
use App\Company;

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

    function selectableCompany() {
        return Company::get();
    }

}