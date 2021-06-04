<?php


Route::namespace('Principal')->group(function () {
    Route::get('/', 'HomeController@index')->name('home-site');
    Route::get('/sobre', 'HomeController@about')->name('about');
    Route::get('/lojas', 'HomeController@locals')->name('locals');
    Route::get('/motos', 'MotorcycleController@index')->name('motorcycle.index');
    Route::get('/categoria-moto/{category}', 'MotorcycleController@category')->name('motorcycle.view-category');
    Route::resource('/contato', 'ContactController')->only(['index', 'store']);

    Route::get('/blog', 'BlogController@index')->name('blog');
    Route::get('/blog/{slug}', 'BlogController@show')->name('blog.show');
    Route::get('/motos/{slug}', 'HomeController@motorcycle')->name('home.motorcycle');
});

Route::get('home', function() {
    return redirect(route('admin.dashboard'));
});

Route::name('admin.')->prefix('admin')->middleware('auth')->group(function() {
    Route::get('dashboard', 'DashboardController')->name('dashboard');

    Route::get('users/roles', 'UserController@roles')->name('users.roles');
    Route::resource('users', 'UserController', [
        'names' => [
            'index' => 'users'
        ]
    ]);

    Route::namespace('Admin\Control')->prefix('control')->group(function() {
        Route::prefix('pubs')->group(function() {
            Route::resource('categories', 'CategoriesController');
            Route::resource('posts', 'PostController');
        });
        Route::resource('contacts', 'ContactController');

        Route::prefix('settings')->group(function() {
            Route::resource('banners', 'BannerController');
            Route::resource('banners-motorcycle', 'BannerMotorcycleController');
        });

        Route::namespace('Bikes')->group(function() {
            Route::resource('bikes', 'BikeController');
            Route::post('bike-attribute', 'BikeAttributeController@store')->name('bikes.attribute');
            Route::delete('bike-attribute/{id}', 'BikeAttributeController@destroy')->name('bikes.destroy-attribute');

            Route::resource('bike-images', 'BikeImageController')->only(['store', 'destroy']);
            Route::resource('bike-category', 'BikeCategoryController')->except(['show']);
        });
    });

});

Route::middleware('auth')->get('logout', function() {
    Auth::logout();
    return redirect(route('login'))->withInfo('Desconectado com sucesso!');
})->name('logout');

Auth::routes(['verify' => true]);

Route::name('js.')->group(function() {
    Route::get('dynamic.js', 'JsController@dynamic')->name('dynamic');
});

// Get authenticated user
Route::get('users/auth', function() {
    return response()->json(['user' => Auth::check() ? Auth::user() : false]);
});
