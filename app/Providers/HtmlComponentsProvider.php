<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class HtmlComponentsProvider extends ServiceProvider {

    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot() {
        \Html::macro('statisticsDiv', function($class, $name, $route = null, $unit, $icon, $panel) {
            return " <div class='col-lg-3 col-md-6'>"
                    . "<div class='panel ".$panel."'>"
                    . "<div class='panel-heading'>"
                    . "   <div class='row'>"
                    . "    <div class='col-xs-3'>"
                    . "        <i class='fa " . $icon . " fa-5x'></i>"
                    . "     </div>"
                    . "    <div class='col-xs-9 text-right'>"
                    . "        <div class='huge " . $class . "'>0</div>"
                    . "       <div><b>" . $unit . "</b></div>"
                    . "   </div>"
                    . "   </div>"
                    . "   </div>"
                    . " <a href='" . $route . "'>"
                    . "  <div class='panel-footer'>"
                    . "   <span class='pull-left'>" . $name . "</span>"
                    . "    <span class='pull-right'><i class='fa fa-arrow-circle-right'></i></span>"
                    . "    <div class='clearfix'></div>"
                    . "  </div>"
                    . "  </a>"
                    . "  </div>"
                    . "</div>";
        });
        \Html::macro('transportDetails', function($name, $value, $icon) {
            return "    <a class='list-group-item'>"
                    . "<i class='fa " . $icon . " fa-fw'></i> " . $name
                    . "<span class='pull-right text-muted'>" . $value
                    . "</span>"
                    . "</a>";
        });
        \Html::macro('transportDetailsLabel', function($name, $is_payed = false, $icon) {

            $label = $is_payed ? "<span class='label label-success pull-right'> Achitat" : "<span class='label label-danger pull-right'> Neachitat";
            return "    <a class='list-group-item'>"
                    . "<i class='fa " . $icon . " fa-fw'></i> " . $name
                    . $label
                    . "</span>"
                    . "</a>";
        });
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register() {
        //
    }

}
