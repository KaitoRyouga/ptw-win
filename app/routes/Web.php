<?php

use App\blade\Blade;

$router = new AltoRouter();

// router auth login
$router->map('GET', '/login', 'App\Controllers\AdminAuthController@indexLogin', '');
$router->map('POST', '/login', 'App\Controllers\AdminAuthController@login', '');
$router->map('GET', '/logout', 'App\Controllers\AdminAuthController@logout', '');

$router->map('GET', '/change-pass', 'App\Controllers\AdminAuthController@changePass', '');
$router->map('POST', '/create-token', 'App\Controllers\AdminAuthController@createToken', '');
$router->map('POST', '/update-pass/[i:userId]', 'App\Controllers\AdminAuthController@updatePass', '');
$router->map('GET', '/reset-pass/[a:token]', 'App\Controllers\AdminAuthController@resetPass', '');

// router auth register
$router->map('GET', '/register', 'App\Controllers\AdminAuthController@indexRegister', '');
$router->map('POST', '/register', 'App\Controllers\AdminAuthController@register', '');

// router chat
$router->map('GET', '/messages', 'App\Controllers\ChatController@index', '');
$router->map('GET', '/get-session', 'App\Controllers\ChatController@getSession', '');
$router->map('POST', '/get-msg', 'App\Controllers\ChatController@getMsg', '');
$router->map('POST', '/send-msg', 'App\Controllers\ChatController@sendMsg', '');
$router->map('POST', '/send-touser', 'App\Controllers\ChatController@sendToUser', '');
$router->map('POST', '/search-user', 'App\Controllers\ChatController@searchUser', '');
$router->map('POST', '/add-user-chat', 'App\Controllers\ChatController@addUser', '');

// router user
$router->map('GET', '/admin/users', 'App\Controllers\AdminUserController@index', '');
$router->map('GET', '/admin', 'App\Controllers\AdminUserController@index', '');
$router->map('GET', '/admin/edit-user/[i:userId]', 'App\Controllers\AdminUserController@show', '');
$router->map('GET', '/admin/delete-user/[i:userId]', 'App\Controllers\AdminUserController@delete', '');
$router->map('GET', '/admin/add-user', 'App\Controllers\AdminUserController@create', '');
$router->map('POST', '/admin/save-user', 'App\Controllers\AdminUserController@store', '');
$router->map('POST', '/admin/update-user/[i:userId]', 'App\Controllers\AdminUserController@update', '');

// router cart
$router->map('GET', '/admin/carts', 'App\Controllers\AdminCartController@index', '');

// router category
$router->map('GET', '/admin/categories', 'App\Controllers\AdminCategoryController@index', '');
$router->map('GET', '/admin/edit-category/[i:catId]', 'App\Controllers\AdminCategoryController@show', '');
$router->map('GET', '/admin/delete-category/[i:catId]', 'App\Controllers\AdminCategoryController@delete', '');
$router->map('GET', '/admin/add-category', 'App\Controllers\AdminCategoryController@create', '');
$router->map('POST', '/admin/save-category', 'App\Controllers\AdminCategoryController@store', '');
$router->map('POST', '/admin/update-category/[i:catId]', 'App\Controllers\AdminCategoryController@update', '');

// router event
$router->map('GET', '/admin/events', 'App\Controllers\AdminEventControlle@index', '');
$router->map('GET', '/admin/edit-event/[i:eventId]', 'App\Controllers\AdminEventControlle@show', '');
$router->map('GET', '/admin/delete-event/[i:eventId]', 'App\Controllers\AdminEventControlle@delete', '');
$router->map('GET', '/admin/add-event', 'App\Controllers\AdminEventControlle@create', '');
$router->map('POST', '/admin/save-event', 'App\Controllers\AdminEventControlle@store', '');
$router->map('POST', '/admin/upload-event', 'App\Controllers\AdminEventControlle@upload', '');
$router->map('GET', '/admin/upload-event', 'App\Controllers\AdminEventControlle@upload', '');
$router->map('POST', '/admin/update-event/[i:eventId]', 'App\Controllers\AdminEventControlle@update', '');

// router info
$router->map('GET', '/info', 'App\Controllers\InfoController@index', '');
$router->map('POST', '/edit-summary', 'App\Controllers\InfoController@editSummary', '');
$router->map('POST', '/edit-education', 'App\Controllers\InfoController@editEducation', '');
$router->map('POST', '/edit-work', 'App\Controllers\InfoController@editWork', '');
$router->map('POST', '/edit-info', 'App\Controllers\InfoController@editInfo', '');
$router->map('POST', '/add-work', 'App\Controllers\InfoController@addWork', '');
$router->map('POST', '/add-education', 'App\Controllers\InfoController@addEducation', '');

// router post
$router->map('GET', '/admin/posts', 'App\Controllers\AdminPostControlle@index', '');
$router->map('GET', '/admin/edit-post/[i:postId]', 'App\Controllers\AdminPostControlle@show', '');
$router->map('GET', '/admin/delete-post/[i:postId]', 'App\Controllers\AdminPostControlle@delete', '');
$router->map('GET', '/admin/add-post', 'App\Controllers\AdminPostControlle@create', '');
$router->map('POST', '/admin/save-post', 'App\Controllers\AdminPostControlle@store', '');
$router->map('POST', '/admin/upload-post', 'App\Controllers\AdminPostControlle@upload', '');
$router->map('GET', '/admin/upload-post', 'App\Controllers\AdminPostControlle@upload', '');
$router->map('POST', '/admin/update-post/[i:postId]', 'App\Controllers\AdminPostControlle@update', '');

// router post
$router->map('GET', '/admin/jobs', 'App\Controllers\AdminJobControlle@index', '');
$router->map('GET', '/admin/edit-job/[i:jobId]', 'App\Controllers\AdminJobControlle@show', '');
$router->map('GET', '/admin/delete-job/[i:jobId]', 'App\Controllers\AdminJobControlle@delete', '');
$router->map('GET', '/admin/add-job', 'App\Controllers\AdminJobControlle@create', '');
$router->map('POST', '/admin/save-job', 'App\Controllers\AdminJobControlle@store', '');
$router->map('POST', '/admin/upload-job', 'App\Controllers\AdminJobControlle@upload', '');
$router->map('GET', '/admin/upload-job', 'App\Controllers\AdminJobControlle@upload', '');
$router->map('POST', '/admin/update-job/[i:jobId]', 'App\Controllers\AdminJobControlle@update', '');

// router event client
$router->map('GET', '/event', 'App\Controllers\EventController@index', '');
$router->map('GET', '/event/[i:eventId]', 'App\Controllers\EventController@getEvent', '');

// router home
$router->map('GET', '/', 'App\Controllers\PostController@index', '');
$router->map('GET', '/posts', 'App\Controllers\PostController@index', '');
$router->map('GET', '/post/[i:postId]', 'App\Controllers\PostController@getPost', '');

// router job
$router->map('GET', '/jobs', 'App\Controllers\JobController@index', '');
$router->map('POST', '/add-job', 'App\Controllers\JobController@addJob', '');
$router->map('GET', '/job/[i:jobId]', 'App\Controllers\JobController@getJob', '');
$router->map('POST', '/get-info', 'App\Controllers\JobController@getInfo', '');
$router->map('GET', '/get-info', 'App\Controllers\JobController@getUser', '');
$router->map('GET', '/edit-job/[i:jobId]', 'App\Controllers\JobController@editJob', '');
$router->map('GET', '/delete-job/[i:jobId]', 'App\Controllers\JobController@deleteJob', '');
$router->map('POST', '/update-job/[i:jobId]', 'App\Controllers\JobController@update', '');
$router->map('POST', '/jobs/search', 'App\Controllers\JobController@search', '');
$router->map('GET', '/jobs/[a:job]', 'App\Controllers\JobController@filter', '');

// router post
$router->map('POST', '/add-post', 'App\Controllers\PostController@store', '');
$router->map('GET', '/edit-post/[i:postId]', 'App\Controllers\PostController@editPost', '');
$router->map('GET', '/delete-post/[i:postId]', 'App\Controllers\PostController@deletePost', '');
$router->map('POST', '/update-post/[i:postId]', 'App\Controllers\PostController@update', '');
$router->map('POST', '/posts/search', 'App\Controllers\PostController@search', '');

// cart
$router->map('GET', '/cart', 'App\Controllers\CartController@index');
$router->map('POST', '/cart', 'App\Controllers\CartController@index');
$router->map('GET', '/cart/buy', 'App\Controllers\CartController@store');
$router->map('GET', '/cart/[i:postId]', 'App\Controllers\CartController@getPost');
$router->map('POST', '/cart/sum', 'App\Controllers\CartController@getSum');
$router->map('GET', '/cart/bought', 'App\Controllers\CartController@getbougth');
$router->map('GET', '/remove/[i:postId]', 'App\Controllers\CartController@remove');

// var_dump($router);