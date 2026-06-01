<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes — SPA (Vue 3 via Vite)
|--------------------------------------------------------------------------
| Toutes les routes renvoient la vue Blade "app" qui monte l'application Vue.
| Le routage côté client est géré par Vue Router.
| Les routes API restent dans routes/api.php.
*/

Route::get('/{any?}', function () {
    return view('app');
})->where('any', '^(?!api).*$');
