<?php
use  App\Events\MessagePosted;
use Illuminate\Support\Facades\Auth;

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


Route::get('/chat', function () { return view('chat.index'); });

Route::group(['middleware' => 'auth'], function () {
    Route::get('/chat', ['uses' => 'ChatsController@index', 'as' => 'chat.index']);
    Route::get('/messages', ['uses' => 'ChatsController@getMessages', 'as' => 'chat.message']);
    Route::post('/messages',['uses' => 'ChatsController@postMessages', 'as' => 'chat.post']);

});

/*
Route::get('/chat', function () {
        return view('chats.index');
    })->middleware('auth');

Route::get('/messages', function () {
    return App\Message::with('user')->get();
})->middleware('auth');

Route::post('/messages', function () {
    // Store the new message
    $user = Auth::user();
    $message = $user->messages()->create([
        'message' => request()->get('message')
    ]);

    // Announce that a new message has been posted
    broadcast(new MessagePosted($message, $user))->toOthers();
    //500 error occurs because i havent set up laravel echo

    return ['status' => 'OK'];
})->middleware('auth');
*/
#Product
Route::resource('products', 'ProductsController');
//Route::get('storage/downloads/{id}', ['uses' => 'ProductsController@download']);
Route::get('products/download/{id}', ['uses' => 'ProductsController@download']);

# Home
Route::get('/', ['as' => 'home', 'uses' => 'ProductsController@index']);

# Admin Boundary
Route::group(['prefix' => 'admin', 'namespace' => 'Admin'], function () {

    Route::resource('products', 'ProductsController', [
        'as' => 'admin'

    ]);
    Route::resource('orders', 'OrdersController', [
        'as' => 'admin'
    ]);

    Route::resource('posts', 'PostsController', [
        'as' => 'admin'
    ]);

    Route::get('/admin/posts/search/{query}', function ($query) {
        return App\Post::search($query)->get();
    });

    Route::post('posts/{post}/comments', function (App\Post $post) {
        $post->addComment([
            'body' => request('body'),
            'parent_id' => request('parent_id', null)
        ]);

        return back();
    });

});


# Posts
Route::resource('posts', 'PostsController', ['only' => ['index', 'show']]);

# Social
Route::get('{provider}/authorize', ['as' => 'authorize', 'uses' => 'SocialsController@authorise']);
Route::get('{provider}/login', ['as' => 'social', 'uses' => 'SocialsController@login']);

# Rss
Route::get('/rss', 'RssController@generate');

# Community
Route::get('community', 'CommunityLinksController@index');
Route::post('community', 'CommunityLinksController@store');
Route::get('community/{channel}', 'CommunityLinksController@index');
Route::post('votes/{link}', 'VotesController@store');

# Checkout
Route::post('/checkout', ['uses' => 'CheckoutController@index']);
Route::get('checkout/thankyou', ['as' => 'checkout.thankyou', 'uses' => 'CheckoutController@thankyou']);
Route::post('/checkout/charges/{id}', ['as' => 'checkout.charges','uses' => 'CheckoutController@charges']);

# Support
Route::get('/support', ['as' => 'support', 'uses' => 'SupportsController@create'])->middleware('auth');
Route::post('/support', ['as' => 'support_store', 'uses' => 'SupportsController@store'])->middleware('auth');


Auth::routes();

# Static Pages
Route::get('/about', ['as' => 'about', 'uses' => 'PagesController@about']);

# Tags
Route::get('tags/{tags}', 'TagsController@show');
Route::get('tags', 'TagsController@index');

# Contact
Route::get('/contact', ['as' => 'contact', 'uses' => 'ContactsController@create'])->middleware('auth');
Route::post('/contact', ['as' => 'contact_store', 'uses' => 'ContactsController@store'])->middleware('auth');

#Profile
Route::resource('profile', 'ProfilesController', ['only' => ['show', 'edit', 'update', 'store', 'create']]);
Route::get('/{profile}', ['as' => 'profile', 'uses' => 'ProfilesController@show']);



# Activity
Route::get('users/{username}/activity', ['as' => 'activity', 'uses' => 'ActivitiesController@show']);


