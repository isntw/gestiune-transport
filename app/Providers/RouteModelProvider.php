<?php

namespace App\Providers;

use Illuminate\Routing\Router;
use Illuminate\Support\ServiceProvider;
use App\Company;

class RouteModelProvider extends ServiceProvider {

    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot(Router $router) {
//        $router->model('registry_type', RegistryType::class);

        $trashedModels = [
            'company' => Company::withTrashed(),
        ];

        foreach ($trashedModels as $key => $model) {
            $router->bind($key, function ($value) use ($model) {
                return $model->find($value);
            });
        }

        foreach ($trashedModels as $id => $v) {
            $router->pattern($id, '[0-9]+');
        }
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
