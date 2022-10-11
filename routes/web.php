<?php

use App\Http\Controllers\PostCommentsController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionsController;
use Illuminate\Support\Facades\Route;


Route::get('newsletter', function () {

    $client = new \MailchimpMarketing\ApiClient();

    $client->setConfig([
        'apiKey' => config('services.mailchimp.key'),
        'server' => 'us10'
    ]);

    // $response = $client->lists->getAllLists();
    // $response = $client->lists->getListMembersInfo("2d45d9aa85");

    $response = $client->lists->addListMember("2d45d9aa85", [
        "email_address" => "testemail@gmail.com",
        "status" => "subscribed",
    ]);



    ddd($response);
});

Route::get('/', [PostController::class, 'index'])->name('home');
Route::get('posts/{post:slug}', [PostController::class, 'show']);
Route::post('posts/{post:slug}/comments', [PostCommentsController::class, 'store']);

Route::get('/register', [RegisterController::class, 'create'])->middleware('guest');
Route::post('/register', [RegisterController::class, 'store'])->middleware('guest');

Route::get('/login', [SessionsController::class, 'create'])->middleware('guest');
Route::post('/sessions', [SessionsController::class, 'store'])->middleware('guest');
Route::post('/logout', [SessionsController::class, 'destroy'])->middleware('auth');
