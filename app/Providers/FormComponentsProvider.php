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

        \Form::macro('formTextArea', function($name, $labelValue, $rows = 5, $textAreaValue = null, $atributes = null) {
            return " <div class='form-group'>"
                    . \Form::label($name, $labelValue)
                    . \Form::textarea($name, $textAreaValue, $atributes ? ['class' => 'form-control ' . $atributes['class'], 'rows' => $rows] : ['class' => 'form-control', 'rows' => $rows])
                    . "</div>";
        });

        \Form::macro('formDropDown', function($name, $elements, $selected = null, $value = "Selecteaza categoria" ) {
            $options = '';
            $default = $selected ? "" : "selected";
            $isSelected = '';
            foreach ($elements as $e) {
                $options .= $e->id == $selected ?
                        "<option selected value=" . $e->id . ">" . $e->name . "</option> " :
                        "<option value=" . $e->id . ">" . $e->name . "</option> ";
            }


            return "<div class='form-group'>"
                    . "<label for=" . $name . ">Select</label>"
                    . "<select class='form-control' name=" . $name . ">"
                    . "<option disabled " . $default . " >" . $value . "</option>"
                    . $options
                    . "</select>"
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
