<?php

namespace App\Providers;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\ServiceProvider;
use PhpParser\Node\Expr\AssignOp\Mod;
use Illuminate\Database\Eloquent\Builder;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Builder::macro('search', function (array $fields, $string){
            if (count($fields) > 2){
                throw new \Exception('Maximum 2 fields are allowed');
            }
            if (count($fields) == 1)
                return $string ? $this->where($fields[0], 'like', '%'.$string.'%') : $this;
            return $string ? $this->where($fields[0], 'like', '%'.$string.'%')->orWhere($fields[1], 'like', '%'.$string.'%') : $this;
        });

        Model::unguard();
    }
}
