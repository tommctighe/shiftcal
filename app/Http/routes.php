<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$app->get('/', function () use ($app) {
    return $app->welcome();
});

//calendar list
$app->get('/calendar', 'CalendarController@showDefaultCalendar');
$app->get('/calendar/{start}/{range}', 'CalendarController@showCalendar');

//event detail
$app->get('/event/{id}', 'EventController@showEvent');

//form
$app->get('/add-event/', 'FormController@showForm');
