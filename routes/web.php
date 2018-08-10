<?php
//==============ADMIN================
Route::get('/3/index','AdminController@index')->name('admin-index');

//==============FREE===============
Route::get('/','FreeController@index')->name('index');
Route::get('/faq','FreeController@faq')->name('faq');
Route::get('/leaderboard','FreeController@leaderboard')->name('leaderboard');
Route::get('/about','FreeController@about')->name('about');
Route::get('/discover-photos','FreeController@discoverPhotos')->name('discover-photos');
Route::get('/popular-photos','FreeController@popularPhotos')->name('popular-photos');
Route::get('/discover-articles','FreeController@discoverArticles')->name('discover-articles');
Route::get('/popular-articles','FreeController@popularArticles')->name('popular-articles');
Route::get('/view-post/{id}','FreeController@viewPostCreate')->name('view-post-create');
Route::get('/search','FreeController@search');

//==========AUTHENTICATED===============
Route::get('/profile','AuthenticatedController@profile')->name('profile');
Route::get('/view-profile/{id}','AuthenticatedController@profile')->name('view-profile');
Route::get('/profile-settings','AuthenticatedController@profileSettings')->name('profile-settings');
Route::post('/change-avatar','AuthenticatedController@changeAvatar')->name('change-avatar');
Route::post('/profile-settings','AuthenticatedController@profileSettingsStore')->name('profile-settings-store');
Route::get('/upload-photos','AuthenticatedController@createPhotos')->name('upload-photos');
Route::get('/create-article','AuthenticatedController@createArticle')->name('create-articles');
Route::post('/upload-post','AuthenticatedController@storePosts')->name('post-store');
Route::get('/contribute','AuthenticatedController@contribute')->name('contribute');
Route::get('/set-profile','AuthenticatedController@setProfileCreate')->name('set-profile');
Route::post('/set-profile','AuthenticatedController@setProfileStore')->name('set-profile-store');
Route::post('/react','AuthenticatedController@react')->name('react');
Route::post('/follow','AuthenticatedController@follow')->name('follow');
Route::post('/block','AuthenticatedController@block')->name('block');
Route::get('/logout','AuthenticatedController@logout')->name('logout');

//==============UNAUTHENTICATED===================
Route::get('/3/login','UnauthenticatedController@adminLogin')->name('admin-login');
Route::get('/login','UnauthenticatedController@loginCreate')->name('login-create');
Route::post('/login','UnauthenticatedController@loginStore')->name('login');
Route::get('/signup','UnauthenticatedController@signupCreate')->name('signup-create');
Route::post('/signup','UnauthenticatedController@signupStore')->name('signup-store');

//===============TEST===========
Route::get('/test','FreeController@test');
