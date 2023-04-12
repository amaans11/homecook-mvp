<?php

use App\Http\Controllers\ExportController;
use App\Http\Livewire\Screens\ChefForm;
use App\Http\Livewire\Screens\Dashboard;
use App\Http\Livewire\Screens\DietForm;
use App\Http\Livewire\Screens\FavoriteCuisineForm;
use App\Http\Livewire\Screens\FoodGoalForm;
use App\Http\Livewire\Screens\Login;
use App\Http\Livewire\Screens\MealsForm;
use App\Http\Livewire\Screens\PeopleChefServeForm;
use App\Http\Livewire\Screens\RestrictionsForm;
use App\Http\Livewire\Screens\ServiceFrequencyForm;
use App\Http\Livewire\Screens\SurveyCompleted;
use App\Http\Livewire\Screens\Welcome;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/logout', function (Request $request) {
    Auth::logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();

    return redirect('/');
});

// Screens
Route::middleware(['guest'])->group(function () {
    Route::get('/app', Welcome::class)->name('welcome');
    Route::get('/login', Login::class)->name('login');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', Dashboard::class)->name('dashboard');
    Route::get('/diet-form', DietForm::class)->name('dietForm');
    Route::get('/food-goal-form', FoodGoalForm::class)->name('foodGoalForm');
    Route::get('/restrictions-form', RestrictionsForm::class)->name('restrictionsForm');
    Route::get('/favorite-cuisine-form', FavoriteCuisineForm::class)->name('favoriteCuisineForm');
    Route::get('/people-chef-serve-form', PeopleChefServeForm::class)->name('peopleChefServeForm');
    Route::get('/meals-form', MealsForm::class)->name('mealsForm');
    Route::get('/chef-form', ChefForm::class)->name('chefForm');
    Route::get('/service-frequency-form', ServiceFrequencyForm::class)->name('serviceFrequencyForm');
    Route::get('/survey-completed', SurveyCompleted::class)->name('surveyCompleted');
});

//unbounce
Route::get('/u/{slug}', function ($slug) {
    return view('unbounce', ['slug' => $slug]);
})->name('unbounce');

Route::get('/', function () {
    return view('unbounce', ['slug' => 'home']);
})->name('home');

Route::get('/export/users', [ExportController::class, 'users'])
    ->name('export.users');
