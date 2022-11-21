<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Validator;
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

        Schema::defaultStringLength(191);

        Validator::extend('presidente', function($attribute, $value, $parameters){
            
   
            return preg_match('/^[a-zA-Z\s]+$/', $value);
         } );
         
         Validator::extend('nombre', function($attribute, $value, $parameters){
                     
           
         return preg_match('/^[a-zA-Z-0-9\s]+$/', $value);
         
             });
            

              
         
             
             }}
         
       

    
    
  