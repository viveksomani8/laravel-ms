<?php
use Illuminate\Http\Request;
use App\Services\NestJsService;
use Illuminate\Routing\Route;

Route::post('/greeting', function (Request $request, NestJsService $nestService) {
    $name = $request->get('name');
    $nestResponse = $nestService->send(['cmd' => 'greeting'], $name);
    return $nestResponse->first();
});
Route::get('/observable', function (NestJsService $nestService) {
    $nestResponse = $nestService->send(['cmd' => 'observable']);
    return $nestResponse->sum();
});