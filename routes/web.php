<?php

use App\Http\Controllers\HomeController;
use App\Models\Category;
use App\Models\Product;
use App\Models\Store;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;




Route::get('/', function () {
    $helloWorld = 'Hello World';
    return view('welcome', ['helloWorld' => $helloWorld]);
})->name('home');

Route::get('/model', function () {
    // $products = \App\Models\Product::all();
    // $user = new User();
    // $user->name = 'usuario teste';
    // $user->email = 'email@teste.com';
    // $user->password = bcrypt('12345678');
    // $user->save();

    // Mass Assignment - atribuição em massa
    // $user = \App\Models\User::create([
    //     'name' => 'David editado',
    //     'email' => 'david@test.com',
    //     'password' => bcrypt('12345678')
    // ]);
    // dd($user);

    // mass update
    // $user = \App\Models\User::find(41);
    // $user->update([
    //     'name' => 'Atualizado'
    // ]);
    // dd($user);

    //criar uma loja para um usuario

    // $user = User::find(10);
    // $store = $user->store()->create([
    //     'name' => 'Loja Teste',
    //     'description' => 'Loja Teste de profutos de informática',
    //     'mobile_phone' => 'xx-xxxxx-xxxx',
    //     'phone' => 'xx-xxxxx-xxxx',
    //     'slug' => 'loja-teste'
    // ]);
    //

    //criar um produto para uma loja

    // $store = Store::find(41);
    // $product = $store->products()->create([
    //     'name' => 'Notebook Acer',
    //     'description' => 'Notebook com core I5 4GB',
    //     'body' => 'muita coisa escrita com 5 paragrafos...',
    //     'price' => '2999.90',
    //     'slug' => 'notebook-acer',
    // ]);
    // dd($product);

    //criar uma categoria

    // Category::create([
    //     'name' => 'Games',
    //     'description' => 'sdfghjklmnbvcxcvbnm',
    //     'slug' => 'games'
    // ]);

    // Category::create([
    //     'name' => 'Notebook',
    //     'description' => 'kkkkkkkkkkkkkkk',
    //     'slug' => 'notebook'
    // ]);

    //adicionar um produto para uma categoria ou vice-versa

    // $product = Product::find(41);
    // dd($product->categories()->attach([4]));



    // return Category::all(); // -retorna todos os usuarios
    // \App\Models\User::find(2); - retorna o usuario com base no id
    // \App\Models\User::where('name', 'usuario teste')->first() busca pelo atributo com comparação
    // \App\Models\User::paginate(10); paginar dados com laravel


    //return $products;
});

Route::group(['middleware' => ['auth']], function () {
    Route::prefix('admin')->name('admin.')->namespace('App\Http\Controllers\Admin')->group(function () {

        // Route::prefix('stores')->name('stores.')->group(function () {

        //     Route::get('/', 'StoreController@index')->name('index');

        //     Route::get('/create', 'StoreController@create')->name('create');

        //     Route::post('/store', 'StoreController@store')->name('store');

        //     Route::get('/{store}/edit', 'StoreController@edit')->name('edit');

        //     Route::post('/update/{store}', 'StoreController@update')->name('update');

        //     Route::get('/destroy/{store}', 'StoreController@destroy')->name('destroy');

        // });

        Route::resource('stores', 'StoreController');
        Route::resource('products', 'ProductController');
    });
});

Auth::routes();

// Route::get('/home', [HomeController::class, 'index'])->name('home');
