<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/test', 'HomeController@test')->name('accueil_perso');

Route::get('/', function () {
    return view('index_accueil');
})->name('accueil_perso');

Route::get('sign-in', function () {
    return view('auth.connexion');
})->name('sign-in');

Route::get('create-compte', function () {
    return view('create_compte.create_compte');
})->name('create-compte');

Route::get('/info_legale', function () {
    return view('/info_legale');
});
Route::get('contact', function () {
    return view('contact');
});
Route::get('contacts', function () {
    return view('contacts');
});

Route::get('/politique_confidentialite', function () {
    return view('/politique_confidentialite');
})->name('politique_confidentialite');

Route::get('/politique_confidentialites', function () {
    return view('/politique_confidentialites');
});
Route::get('/tarifs', function () {
    return view('/tarif');
});

Route::get('condition_generale_de_vente', 'ConditionController@index')->name('condition_generale_de_vente');

Route::get('/home', 'HomeController@index')->name('home');
/**Creer nouveau type */
Route::get('/nouveau', function () {
    return view('superadmin.type');
})->name('nouveau');



/**Enregistrer nouveau type */
Route::resource('abonnement','TypeAbonnementController');

Route::get('listeAbonne','AbonnementController@listeAbonne')->name('listeAbonne');
Route::get('verification','TypeAbonnementController@verification')->name('verification');
