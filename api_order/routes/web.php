<?php

Route::prefix('admin')->namespace('Admin')->group(function (){
    /**
     * Routes Details Plans
     */
    Route::post('plans/{url}/details','DetailsPlanController@store')->name('details.plan.store');
    Route::get('plans/{url}/details/create','DetailsPlanController@create')->name('details.plan.create');
    Route::get('plans/{url}/details','DetailsPlanController@index')->name('details.plan.index');


    /**
     * Routes Plans
     */
    Route::any('plans/search','PlanController@search')->name('plans.search');
    Route::put('plans/{url}','PlanController@update')->name('plans.update');
    Route::delete('plans/{url}', 'PlanController@destroy')->name('plans.destroy');
    Route::get('plans/{url}', 'PlanController@show')->name('plans.show');
    Route::post('plans', 'PlanController@store')->name('plans.store');
    Route::get('pages/plans/create', 'PlanController@create')->name('plans.create');
    Route::get('plans/{url}/edit', 'PlanController@edit')->name('plans.edit');
    Route::get('plans', 'PlanController@index')->name('plans.index');
    Route::get('', 'PlanController@index')->name('admin.index');
});

Route::get('/', function () {
    return view('welcome');
});
