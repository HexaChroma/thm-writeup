<?php
Route::add(array('GET', 'POST'), '/', 'Cms@home');
Route::add(array('GET', 'POST'), '/contact', 'Cms@contact');
Route::add(array('GET', 'POST'), '/about', 'Cms@about');




Route::add(array('GET', 'POST'), '/vbcms', 'Cms@admin');
Route::add(array('GET', 'POST'), '/vbcms/edit', 'Cms@edit');


Route::add(array('GET', 'POST'), '/vbcms/login', 'Cms@login');
Route::add(array('GET', 'POST'), '/vbcms/logout', 'Cms@logout');