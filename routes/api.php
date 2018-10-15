<?php

use Illuminate\Http\Request;
use App\App;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::post('app/search', function() {
    $q = Input::get('q');
    if($q != ' '){
        $app = App::where('name', 'LIKE', '%' . $q . '%')->get();
        if(count($app) > 0) {
            return view('frontend.app.search')->with('apps', $app);
        }
    }
    return view('frontend.app.search')->with('message', 'No apps found! Try searching by link');

})->name('api.app.search');
Route::post('app/check', 'Frontend\AppsController@check')->name('api.app.check');