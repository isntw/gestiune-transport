<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class TableComponentsProvider extends ServiceProvider {

    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot() {
        \Html::macro('viewButton', function($route, $id) {
            return "<a class='btn btn-outline btn-primary btn-xs' title='View' href='" . route($route, $id) . "'><i class='fa fa-eye'></i></a>";
        });
        \Html::macro('editButton', function($route, $id) {
            return "<a class='btn btn-outline btn-warning btn-xs' title='Edit' href='" . route($route, $id) . "'><i class='fa fa-pencil'></i></a>";
        });
        \Html::macro('deleteButton', function($route, $id, $isDeleted = false, $title = "Schimbare stare", $message = "Sunteti sigur ca doriti sa schimbati starea?") {
            $realId = is_array($id) ? $id[count($id) - 1] : $id;
            $state = $isDeleted ? 'btn-success' : 'btn-danger';
            $icon = $isDeleted ? 'fa-check' : 'fa-times';
            $title = $title ? $title : (!$isDeleted ? 'Sterge' : 'Activeaza');
            $formId = 'delete-form';

            return "<a class='btn btn-outline $state btn-xs' title='$title' href='" . route($route, $id) . "' "
                    . "  onclick=\"event.preventDefault(); deleteResource('$title', '$message', '$formId-$realId')\" >"
                    . "<i class='fa $icon'></i></a>"
                    . \Form::open(['url' => route($route, $id), 'method' => 'DELETE', 'id' => "$formId-$realId", 'class' => 'hidden'])
                    . \Form::close();
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
