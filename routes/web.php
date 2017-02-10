<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

use App\Menu;
use App\Order;

Route::group(['middleware' => 'web'], function () {

    Route::get('/', [
        'uses' => 'HomeController@show_home',
        'as' => 'home',
        'middleware' => 'web'
    ]);

    Route::group(['prefix' => 'order'], function () {

        Route::get('/menu', [
            'uses' => 'OrderController@show_menu',
            'as' => 'order.menu'
        ]);

        Route::get('/add/{id}', [
            'uses' => 'OrderController@add_item',
            'as' => 'order.add'
        ]);

        Route::get('/minus/{id}', [
            'uses' => 'OrderController@remove_item',
            'as' => 'order.remove'
        ]);

        Route::get('/overview', [
            'uses' => 'OrderController@show_overview',
            'as' => 'order.overview'
        ]);

        Route::get('/shipping', [
            'uses' => 'OrderController@ship_orders',
            'as' => 'order.shipping'
        ]);

        Route::post('/order', [
            'uses' => 'OrderController@order_items',
            'as' => 'order.order'
        ]);

        Route::post('/userorder', [
            'uses' => 'OrderController@user_order_items',
            'as' => 'order.userorder'
        ]);
    });

    Route::group(['prefix' => 'user'], function () {

        Route::group(['middleware' => 'guest'], function () {

            Route::get('/signup', [
                'uses' => 'UserController@show_signup',
                'as' => 'user.signup'
            ]);

            Route::post('/signupuser', [
                'uses' => 'UserController@signUpUser',
                'as' => 'user.signupuser'
            ]);

            Route::get('/login', [
                'uses' => 'UserController@show_login',
                'as' => 'user.login'
            ]);

            Route::post('/loginuser', [
                'uses' => 'UserController@logInUser',
                'as' => 'user.loginuser'
            ]);
        });

        Route::group(['middleware' => 'auth'], function () {

            Route::get('/logout', [
                'uses' => 'UserController@logOutUser',
                'as' => 'user.logout'
            ]);
        });
    });

    Route::group(['prefix' => 'password'], function () {

        Route::group(['middleware' => 'guest'], function () {

            Route::get('/requestForm', [
                'uses' => 'Auth\ForgotPasswordController@showLinkRequestForm',
                'as' => 'password.requestForm'
            ]);

            Route::post('/email', [
                'uses' => 'Auth\ForgotPasswordController@sendResetLinkEmail',
                'as' => 'password.email'
            ]);

            Route::get('/reset/{token}', [
                'uses' => 'Auth\ResetPasswordController@showResetForm',
                'as' => 'password.resetForm'
            ]);

            Route::post('/reset', [
                'uses' => 'Auth\ResetPasswordController@reset',
                'as' => 'password.reset'
            ]);
        });
    });

    Route::group(['prefix' => 'reservation'], function () {

        Route::get('/reservation', [
            'uses' => 'ReservationController@show_spots',
            'as' => 'reservation.reservation'
        ]);

        Route::get('/updatespots/{date}/{timespan}', [
            'uses' => 'ReservationController@update_spots',
            'as' => 'reservation.update'
        ]);

        Route::post('reservespots', [
            'uses' => 'ReservationController@reserve_spots',
            'as' => 'reservation.reserve'
        ]);
    });
});
