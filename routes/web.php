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

/*
 * Principal
 */
/*User*/
Route::get('/', function () {
    $posts = DestinyH\Post::orderBy('created_at', 'desc')->take(6)->get();
    $top_games = DestinyH\Game::orderBy('game_karma', 'desc')->take(8)->get();
    return view('portal.views.home', compact('posts', 'top_games'));
})->name('home');
/*
 * Route de listado de juegos
 */
Route::get('games', function () {
    $games = DestinyH\Game::orderBy('created_at', 'desc')->paginate(4);
    $top_game = DestinyH\Game::orderBy('game_karma', 'desc')->take(1)->get();
    $top_posts = DestinyH\Post::orderBy('post_karma', 'desc')->take(3)->get();
    return view('portal.views.game-list', compact('games', 'top_game', 'top_posts'));
})->name('games');
/*
 * Route de juego (single)
 */
Route::get('games/{slug}', 'GameController@show')->name('sGame');
/*
 * Route de listado de posts
 */
Route::get('posts', function () {
    $posts = DestinyH\Post::orderBy('created_at', 'desc')->paginate(8);
    $top_game = DestinyH\Game::orderBy('game_karma', 'desc')->take(1)->get();
    return view('portal.views.post-list', compact('posts', 'top_game'));
})->name('posts');
/*
 * Route de post (single)
 */
Route::get('posts/{slug}', 'PostController@show')->name('sPost');
/*
 * Route de perfil
 */
Route::get('profile/{slug}', 'UserController@show')->name('profile');
/*
 * Ruta de subscription
 */
Route::get('subscribe', 'SubscribeController@index')->name('gSubscribe');
Route::post('subscribe', 'SubscribeController@store')->name('pSubscribe');
/*
 * Ruta de login
 */
Route::get('login', function () {
    return view('portal.views.login');
})->name('gLogin');
Route::post('login', 'LoginController@login')->name('pLogin');
Route::get('logout', function () {
    Auth::logout();
    return redirect()->route('home');
})->name('logout');

/*
 * Ruta de registro
 */
Route::get('register', function () {
    return view('portal.views.register');
})->name('gRegister');
Route::post('register', 'LoginController@register')->name('pRegister');
/*
 * Ruta de contacto
 */
Route::get('contact', 'ContactController@index')->name('gContact');
Route::post('contact', 'ContactController@store')->name('pContact');

/**
 * Rutas utiles
 */
Route::post('comment', 'CommentController@store')->name('pComment');
Route::post('think', 'UserController@updateThink')->name('pUpdateThink');
Route::get('terms-of-service', function () {
    return redirect()->back();
})->name('terms');

/**
 * Rutas para redireccion
 */
Route::get('forum', function () {
    $link = DestinyH\Option::where('option_name', 'site_forum')->first();
    $link = $link->option_value;
    return redirect($link);
})->name('r_forum');

/**
 * Rutas para administracion
 */
Route::group(['prefix' => 'admin'], function () {
    Route::get('/', function () {
        return redirect()->route('admin_dashboard');
    });
    Route::get('dashboard', function () {
        return view('admin.views.home');
    })->middleware('admin')->name('admin_dashboard');
    Route::resource('users', 'UserController', ['except' => [
        'show',
    ]]);
    Route::get('users/{id}/destroy', 'UserController@destroy')->middleware('admin')->name('gUserDestroy');
    Route::resource('games', 'GameController', ['except' => [
        'show']]);
    Route::get('games/{id}/destroy', 'GameController@destroy')->middleware('admin')->name('gGameDestroy');
    Route::resource('posts', 'PostController', ['except' => [
        'show']]);
    Route::get('posts/{id}/destroy', 'PostController@destroy')->middleware('admin')->name('gPostDestroy');
    //Search for user_nicename
    Route::get('searchUser/{nicename}', 'UserController@searchUser')->name('searchUser');
    Route::get('searchGame/{title}', 'GameController@searchGame')->name('searchGame');
    Route::get('searchPost/{title}', 'PostController@searchPost')->name('searchPost');
});