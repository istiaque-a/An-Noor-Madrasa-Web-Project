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



         \Validator::extend('phone_unique', function ($attribute, $value, $parameters, $validator) {
          $inputs = $validator->getData();

          // var_dump($validator);



          // $code = $inputs['code'];
          $phone = $inputs['mobile'];

          //$concatenated_number = $code . ' ' . $phone;
          //$except_id = (!empty($parameters)) ? head($parameters) : null;

          /*$query = User::where('phone', $concatenated_number);
          if(!empty($except_id)) {
            $query->where('id', '<>', $except);
          }*/

          $last_part_of_phone=substr($value, -10);


          $query = DB::select(DB::raw('SELECT * FROM `users` WHERE RIGHT(phone,10) = '.$last_part_of_phone));

          // echo " count = ".count($query);

          // exit;
          $total_result=count($query);

          if($total_result){

            return false;

          }else{

            return true;
          }

          // return count($query);

          // return $query->exists();
      });
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
