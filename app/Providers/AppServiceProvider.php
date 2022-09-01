<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use DB;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->validateUniqueSpaceCheck();
    }


      /**
     * The field under validation must be unique on a given database table and checks for extra spaces in-between strings.
     * If the column option is not specified, the field name will be used.
     *
     * unique_space_check:table,column
     */
    public function validateUniqueSpaceCheck()
    {
        \Validator::extend('unique_space_check', function($attribute, $value, $parameters)
        {
            $attribute = (isset($parameters[1])) ? $parameters[1] : $attribute;

            $value = trim(preg_replace('/\s\s+/', ' ', $value));

            $check = DB::table($parameters[0])->where($attribute, $value)->count();

            return ($check > 0) ? false : true;

        }, 'The :attribute has already been taken.');
    }

}
