<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'DashboardController@home');

Route::group(['prefix' => 'about'], function () {
    Route::get('cimsa', function () {
        $title = 'CIMSA';
        return view('about.about')->with(compact('title'));
    });
    Route::get('partners', function () {
        return view('about.partner');
    });
    Route::get('our-team', function () {
        return view('our-team');
    });
    Route::get('alumni', function () {
        return view('about.alumni');
    });
    Route::get('alumni/alumni-of-the-month', 'AlumniController@showAlumniOfTheMonth');
    Route::get('alumni/list-alumni-of-the-month', 'AlumniController@showNews');
    Route::get('alumni/directory', 'AlumniController@showAlumni');
});

Route::get('/articles', 'ArticlesController@showArticles');
Route::get('/articles/{articleId}', [
    'as' => 'articles.detail',
    'uses' => 'ArticlesController@showArticlesDetail'
]);

Route::get('/activities', 'ActivitiesController@showActivities');
Route::get('/activities/{activityId}', [
    'as' => 'activity.detail',
    'uses' => 'ActivitiesController@showActivityDetail'
]);
Route::get('/lotm/{lotmId}', [
    'as' => 'lotm.detail',
    'uses' => 'AlumniController@showNewsDetail'
]);

Route::get('/standing-committees', 'GuestController@showStandingCommittees');
Route::group(['prefix' => 'standing-committees'], function () {
    Route::get('/scome', function () {
        $title = 'SCOME';

        return view('sc.scome', compact('title'));
    });
    Route::get('/scope', function () {
        $title = 'SCOPE';

        return view('sc.scope', compact('title'));
    });
    Route::get('/score', function () {
        $title = 'SCORE';

        return view('sc.score', compact('title'));
    });
    Route::get('/scoph', function () {
        $title = 'SOCPH';

        return view('sc.scoph', compact('title'));
    });
    Route::get('/scora', function () {
        $title = 'SCORA';

        return view('sc.scora', compact('title'));
    });
    Route::get('/scorp', function () {
        $title = 'SCORP';

        return view('sc.scorp', compact('title'));
    });
});
Route::get('catalogs', 'CatalogsController@showCatalogs');
Route::get('catalog/detail/{id}', 'CatalogsController@showCatalogDetail')->name('catalogs.detail');
Route::group(['prefix' => 'admin', 'middleware' => ['admin', 'revalidate']], function () {
    Route::get('/', 'DashboardController@index');
    Route::get('/catalogs', 'CatalogsController@index');
    Route::post('/catalogs/store', 'CatalogsController@store');
    Route::get('/catalogs/edit/{id}', 'CatalogsController@edit');
    Route::put('/catalogs/update/{id}', 'CatalogsController@update');
    Route::delete('/catalogs/destroy/{id}', 'CatalogsController@destroy');
    Route::get('/activities', 'ActivitiesController@index');
    Route::post('/activities/store', 'ActivitiesController@store');
    Route::get('/activities/edit/{id}', 'ActivitiesController@edit');
    Route::put('/activities/update/{id}', 'ActivitiesController@update');
    Route::delete('/activities/destroy/{id}', 'ActivitiesController@destroy');
    Route::get('/articles', 'ArticlesController@index');
    Route::get('/articles/datatable', 'ArticlesController@datatablesRequest');
    Route::post('/articles/store', 'ArticlesController@store');
    Route::get('/articles/edit/{id}', 'ArticlesController@edit');
    Route::post('/articles/update/{id}', 'ArticlesController@update');
    Route::delete('/articles/destroy/{id}', 'ArticlesController@destroy');

    Route::get('/lotm', 'AlumniController@indexListofthemonth');
    Route::get('/list-alumni-otm', 'AlumniController@showAlumniOtm');
    Route::post('/store-lotm', 'AlumniController@storeListofthemonth');
    Route::put('/update-lotm/{id}', 'AlumniController@updateListofthemonth');
    Route::get('/alumni/edit-lotm/{id}', 'AlumniController@editListofthemonth');
    Route::delete('/destroy-lotm/{id}', 'AlumniController@destroyListofthemonth');

    Route::get('/alumni', 'AlumniController@index');
    Route::post('/alumni/store', 'AlumniController@store');
    Route::get('/alumni/edit/{id}', 'AlumniController@edit');
    Route::post('/alumni/update/{id}', 'AlumniController@update');
    Route::delete('/alumni/destroy/{id}', 'AlumniController@destroy');
    Route::post('/alumni/storeofthemonth', 'AlumniController@storeUpdateAlumniOfTheMonth');
    Route::get('/message', 'MessageController@index');
    Route::delete('message/destroy/{id}', 'MessageController@destroy');
    Route::get('/resetaccount', 'ResetController@resetaccount');
    Route::post('/reset', 'ResetController@reset');
    // Route::get('/our-team', 'OurteamController@index')->name('ourteam.index');
});
Route::post('/sendMsg', 'MessageController@store');
Route::group(['middleware' => 'web'], function () {
    Auth::routes();
    Route::post('/customlogin', 'ResetController@customlogin');
});
