<?php

if (! function_exists('routeRenaming')) {
    function routeRenaming($routePrefix)
    {
        return [
            'index' => "{$routePrefix}.index",
            'create' => "{$routePrefix}.create",
            'store' => "{$routePrefix}.store",
            'show' => "{$routePrefix}.show",
            'edit' => "{$routePrefix}.edit",
            'update' => "{$routePrefix}.update",
            'destroy' => "{$routePrefix}.destroy",
        ];
    }
}

if (! function_exists('paginate')) {
    function paginate(\Illuminate\Database\Eloquent\Builder $builder)
    {
        return $builder->paginate()->setPageName('seite');
    }
}
