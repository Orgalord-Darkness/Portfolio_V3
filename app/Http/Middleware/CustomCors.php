<?php

// namespace App\Http\Middleware;

// use Closure;

// class CustomCors
// {
//     public function handle($request, Closure $next)
//     {
//         $response = $next($request);

//         // Ajouter les en-têtes CORS nécessaires
//         $response->headers->set('Access-Control-Allow-Origin', '*');
//         $response->headers->set('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, OPTIONS');
//         $response->headers->set('Access-Control-Allow-Headers', 'Content-Type, Authorization');

//         return $response;
//     }
// }