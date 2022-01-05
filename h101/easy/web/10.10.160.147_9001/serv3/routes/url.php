<?php
Route::add(array('GET', 'POST'), '/', 'Website@home');
Route::add(array('GET', 'POST'), '/lesson/[int]', 'Website@lesson1');
Route::add(array('GET', 'POST'), '/subscribe', 'Website@subscribe');
Route::add(array('GET', 'POST'), '/trycode', 'Website@trycode');
