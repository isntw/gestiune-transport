<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class FormComponentsProvider extends ServiceProvider {

    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot() {
        \Form::macro('formInput', function($name, $labelValue, $inputValue = null, $atributes = null) {
            return "<div class='form-group'>"
                    . \Form::label($name, $labelValue)
                    . \Form::input(null, $name, $inputValue, $atributes ? ['class' => 'form-control ' . $atributes['class']] : ['class' => 'form-control'])
                    . "</div>";
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
