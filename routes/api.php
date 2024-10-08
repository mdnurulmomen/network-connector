<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SkillController;
use App\Http\Controllers\MyUserController;
use App\Http\Controllers\InterestController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\UserInterestController;
use App\Http\Controllers\PoliticalPartyController;
use App\Http\Controllers\UserLocationController;
use App\Http\Controllers\UserSkillController;
use App\Http\Controllers\UserTypeController;
use App\Http\Controllers\UserPoliticalPartyController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/
Route::prefix('v1')->group(function () {

    Route::apiResource('skills', SkillController::class)->only('index');
    Route::apiResource('interests', InterestController::class)->only('index');
    Route::apiResource('locations', LocationController::class)->only('index');

    Route::apiResource('political-parties', PoliticalPartyController::class)->parameters([
        'political-parties' => 'politicalParty'
    ])->only('index');

    Route::apiResource('user-types', UserTypeController::class)->parameters([
        'user-types' => 'userType'
    ])->only('index');

    Route::middleware('auth:sanctum')->group(function () {
        Route::apiResource('skills', SkillController::class)->except('index');

        Route::apiResource('interests', InterestController::class)->except('index');

        Route::apiResource('locations', LocationController::class)->except('index');

        Route::apiResource('political-parties', PoliticalPartyController::class)->parameters([
            'political-parties' => 'politicalParty'
        ])->except('index');

        Route::apiResource('user-locations', UserLocationController::class)->parameters([
            'user-locations' => 'userLocation'
        ]);

        Route::apiResource('user-political-parties', UserPoliticalPartyController::class)->parameters([
            'user-political-parties' => 'userPoliticalParty'
        ]);

        Route::apiResource('user-skills', UserSkillController::class)->parameters([
            'user-skills' => 'userSkill'
        ]);

        Route::resource('user-interests', UserInterestController::class)->parameters([
            'user-interests' => 'userInterest'
        ]);

        Route::get('/users', [MyUserController::class, 'index'])->name('users');
    });
});
