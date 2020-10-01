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

Route::group([
    'prefix' => 'about'
], function () {
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
});

Route::group([
    'prefix' => 'alumni'
], function () {
    Route::get('/', function () {
        return view('about.alumni');
    });
    Route::get('/alumni-of-the-month', 'AlumniController@showAlumniOfTheMonth');
    Route::get('/list-alumni-of-the-month', 'AlumniController@showNews');
    Route::get('/directory', 'AlumniController@showAlumni');
});

Route::group([
    'prefix' => 'articles'
], function () {
    Route::get('/', 'ArticlesController@showArticles');
    Route::get('/{articleId}', [
        'as' => 'articles.detail',
        'uses' => 'ArticlesController@showArticlesDetail'
    ]);
});

Route::group([
    'prefix' => 'activities'
], function () {
    Route::get('/', 'ActivitiesController@showActivities');
    Route::get('/{activityId}', [
        'as' => 'activity.detail',
        'uses' => 'ActivitiesController@showActivityDetail'
    ]);
});

Route::get('/lotm/{lotmId}', [
    'as' => 'lotm.detail',
    'uses' => 'AlumniController@showNewsDetail'
]);

Route::group([
    'prefix' => 'standing-committees'
], function () {
    Route::get('/', 'GuestController@showStandingCommittees');
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

Route::group([
    'prefix' => 'catalogs'
], function () {
    Route::get('/', 'CatalogsController@showCatalogs');
    Route::get('/detail/{id}', 'CatalogsController@showCatalogDetail')->name('catalogs.detail');
});

Route::group([
    'prefix' => 'admin',
    'middleware' => ['admin']
], function () {
    Route::get('/', 'DashboardController@index');

    Route::group([
        'prefix' => 'catalogs'
    ], function () {
        Route::get('/', 'CatalogsController@index');
        Route::post('/store', 'CatalogsController@store');
        Route::get('/edit/{id}', 'CatalogsController@edit');
        Route::put('/update/{id}', 'CatalogsController@update');
        Route::delete('/destroy/{id}', 'CatalogsController@destroy');
    });

    Route::group([
        'prefix' => 'activities'
    ], function () {
        Route::get('/', 'ActivitiesController@index');
        Route::post('/store', 'ActivitiesController@store');
        Route::get('/edit/{id}', 'ActivitiesController@edit');
        Route::put('/update/{id}', 'ActivitiesController@update');
        Route::delete('/destroy/{id}', 'ActivitiesController@destroy');
    });

    Route::group([
        'prefix' => 'articles'
    ], function () {
        Route::get('/', 'ArticlesController@index');
        Route::get('/datatable', 'ArticlesController@datatablesRequest');
        Route::post('/store', 'ArticlesController@store');
        Route::get('/edit/{id}', 'ArticlesController@edit');
        Route::post('/update/{id}', 'ArticlesController@update');
        Route::delete('/destroy/{id}', 'ArticlesController@destroy');
    });

    Route::group([
        'prefix' => 'alumni'
    ], function () {
        Route::get('/', 'AlumniController@index');
        Route::post('/store', 'AlumniController@store');
        Route::get('/edit/{id}', 'AlumniController@edit');
        Route::post('/update/{id}', 'AlumniController@update');
        Route::delete('/destroy/{id}', 'AlumniController@destroy');
        Route::post('/storeofthemonth', 'AlumniController@storeUpdateAlumniOfTheMonth');
    });

    Route::group([
        'prefix' => 'message'
    ], function () {
        Route::get('/', 'MessageController@index');
        Route::delete('/destroy/{id}', 'MessageController@destroy');
    });

    Route::get('/lotm', 'AlumniController@indexListofthemonth');
    Route::get('/list-alumni-otm', 'AlumniController@showAlumniOtm');
    Route::post('/store-lotm', 'AlumniController@storeListofthemonth');
    Route::put('/update-lotm/{id}', 'AlumniController@updateListofthemonth');
    Route::get('/alumni/edit-lotm/{id}', 'AlumniController@editListofthemonth');
    Route::delete('/destroy-lotm/{id}', 'AlumniController@destroyListofthemonth');

    Route::get('/resetaccount', 'ResetController@resetaccount');
    Route::post('/reset', 'ResetController@reset');
});

Route::post('/sendMsg', 'MessageController@store');

Route::group([
    'middleware' => 'web'
], function () {
    Auth::routes();
    Route::post('/customlogin', 'ResetController@customlogin');
});

Route::post('/login', function () {
    echo 'yes';
});
