<?php

use App\Http\Controllers\WebsiteController;
use Illuminate\Support\Facades\Route;

Route::inertia('/', 'Website/Home')->name('website.home');
Route::inertia('/courses', 'Website/Courses')->name('website.courses');
Route::inertia('/tutorials', 'Website/Tutorials')->name('website.tutorials');
Route::inertia('/about_us', 'Website/AboutUs')->name('website.about_us');
Route::inertia('/contact_us', 'Website/ContactUs')->name('website.contact_us');
Route::inertia('/instructors', 'Website/Instructors')->name('website.instructors');

