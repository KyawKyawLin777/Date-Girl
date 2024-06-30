<?php

use App\Http\Controllers\Auth\CustomLoginController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\dashboard\Analytics;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\layouts\WithoutMenu;
use App\Http\Controllers\layouts\WithoutNavbar;
use App\Http\Controllers\layouts\Fluid;
use App\Http\Controllers\layouts\Container;
use App\Http\Controllers\layouts\Blank;
use App\Http\Controllers\GirlController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ReportCommissionController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\TextCreateController;
use App\Http\Controllers\UserController;

Route::get('/', [FrontendController::class, 'welcome']);
Route::get('/index', [FrontendController::class, 'index']);
Route::post('/search', [FrontendController::class, 'search'])->name('search');

//order
Route::get('/orderPage/{id}', [OrderController::class, 'orderPage'])->name('order#orderPage');
Route::post('/orderCreate', [OrderController::class, 'orderCreate'])->name('order#orderCreate');

Route::get('admin_login', [App\Http\Controllers\Auth\CustomLoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [App\Http\Controllers\Auth\CustomLoginController::class, 'login'])->name('custom.login');
Route::post('logout', [App\Http\Controllers\Auth\CustomLoginController::class, 'logout'])->name('logout');


Route::get('change-language/{locale}', 'App\Http\Controllers\LocalizationController@changeLanguage')->name('changeLanguage');


Route::middleware(['auth'])->group(function () {
  Route::get('/dashboard', [Analytics::class, 'index'])->name('dashboard-analytics');
  Route::get('/layouts/without-menu', [WithoutMenu::class, 'index'])->name('layouts-without-menu');
  Route::get('/layouts/without-navbar', [WithoutNavbar::class, 'index'])->name('layouts-without-navbar');
  Route::get('/layouts/fluid', [Fluid::class, 'index'])->name('layouts-fluid');
  Route::get('/layouts/container', [Container::class, 'index'])->name('layouts-container');
  Route::get('/layouts/blank', [Blank::class, 'index'])->name('layouts-blank');
  Route::get('/profile_edit/{id}', [UserController::class, 'edit']);
  Route::put('profile/{id}', [UserController::class, 'update'])->name('profile.update');

  Route::get('/orderList', [OrderController::class, 'orderList'])->name('order#orderList');
  Route::get('/orderReject/{id}', [OrderController::class, 'orderReject'])->name('order#orderReject');
  // report
  Route::post('/stateChange/{id}', [ReportController::class, 'stateChange'])->name('report#stateChange');
  Route::get('/reportList', [ReportController::class, 'reportList'])->name('report#reportList');
  Route::get('/nameSearch', [ReportController::class, 'nameSearch'])->name('report#nameSearch');
  Route::get('/dateRangeSearch', [ReportController::class, 'dateRangeSearch'])->name('report#dateRangeSearch');

  //Commission Report
  Route::get('/commission_reportList', [GirlController::class, 'commissionReportList']);
  Route::get('/girl_history/{id}', [GirlController::class, 'girlHistory']);
  Route::get('/girl_history_search/{girl_id}', [GirlController::class, 'gitlHistorySearch']);
  Route::get('/girl_search', [GirlController::class, 'nameSearch']);
  Route::get('commission_search', [GirlController::class, 'commissionDateSearch']);


  // Country
  Route::get('/countryPage', [CategoryController::class, 'countryPage'])->name('country#countryPage');
  Route::post('/countryCreate', [CategoryController::class, 'countryCreate'])->name('country#countryCreate');
  Route::get('/countryEdit/{id}', [CategoryController::class, 'countryEdit'])->name('country#countryEdit');
  Route::post('/countryUpdate/{id}', [CategoryController::class, 'countryUpdate'])->name('country#countryUpdate');
  Route::get('/countryDelete/{id}', [CategoryController::class, 'countryDelete'])->name('country#countryDelete');

  // Girl
  Route::get('/girlPage', [GirlController::class, 'girlPage'])->name('girl#girlPage');
  Route::post('/girlCreate', [GirlController::class, 'girlCreate'])->name('girl#girlCreate');
  Route::get('/girlDelete/{id}', [GirlController::class, 'girlDelete'])->name('girl#girlDelete');
  Route::get('/girlEdit/{id}', [GirlController::class, 'girlEdit'])->name('girl#girlEdit');
  Route::post('/girlUpdate/{id}', [GirlController::class, 'girlUpdate'])->name('girl#girlUpdate');
  Route::get('/girl_on_off', [GirlController::class, 'girlOnOff']);
  Route::put('/girl_on/{id}', [GirlController::class, 'girlOn'])->name('girlon');
  Route::put('/girl_off/{id}', [GirlController::class, 'girlOff'])->name('girloff');
  Route::get('/girlDetail/{id}', [GirlController::class, 'girlDetail'])->name('girl#girlDetail');

  //text
  Route::get('/text', [TextCreateController::class, 'index']);
  Route::post('/text_register', [TextCreateController::class, 'store']);
  Route::get('/text_edit/{id}', [TextCreateController::class, 'edit']);
  Route::post('/text_update/{id}', [TextCreateController::class, 'update']);
  Route::get('/text_delete/{id}', [TextCreateController::class, 'delete']);
});
