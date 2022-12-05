<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Route;


Route::get('/', function () {return view('home'); })->name('welcome');
Route::post('/mail',[MailController::class,'sendMail'])->name('mail');

Route::get('/demoMail',[DemoMailController::class,'sendMail'])->name('sendMail');

Route::get('/viewAnnouncement', [MailController::class,'viewAnnouncement']);

Route::get('/mailstatus',[MailController::class,'mailstatus'])->name('mailstatus');

Route::post('/sendRequest',[LandlordController::class,'sendRequest'])->name('sendRequest');

Route::get('payment', [LandlordController::class,'paymentScreen']);
Route::post('updatePayment', [LandlordController::class,'updatePayment'])->name('updatePayment');


Route::prefix('landlord')->name('landlord.')->group(function(){
    Route::get('home', [LandlordController::class, 'home'])->name('home');
    
    Route::get('login',[LandlordController::class,'login'])->name('login');
    Route::get('logout',[LandlordController::class,'logout'])->name('logout');

    Route::get('register',[LandlordController::class,'openRegPage'])->name('register');
    Route::post('register',[LandlordController::class,'register'])->name('regLandlord');
    
    Route::get('AddProperty',[LandlordController::class,'AddProperty'])->name('AddProperty');
    Route::post('AddProperty',[PropertyController::class,'store'])->name('RegProperty');
    Route::get('ViewProperty',[LandlordController::class,'ViewProperty'])->name('ViewProperty');
    
    Route::get('EditProperty/{id}',[LandlordController::class,'EditProperty'])->name('EditProperty');
    Route::post('updateProperty',[PropertyController::class,'update'])->name('updateProperty');

    Route::get('AddAnnouncement', [LandlordController::class,'AddAnnouncement'])->name('AddAnnouncement');
    Route::post('SendAnnouncement', [LandlordController::class,'SendAnnouncement'])->name('SendAnnouncement');
    
    Route::get('payment', [LandlordController::class,'payment'])->name('payment');
    
    
    Route::get('viewEarnings', [LandlordController::class,'viewEarnings'])->name('viewEarnings');
    Route::get('viewOverdue', [LandlordController::class,'viewOverdue'])->name('viewOverdue');


    
    
    Route::post('getDataByDate', [LandlordController::class,'getDataByDate'])->name('getDataByDate');
    Route::post('AddPayment', [LandlordController::class,'AddPayment'])->name('AddPayment');
    Route::post('getTenants', [LandlordController::class,'getTenants'])->name('getTenants');
    

    Route::get('googleFunction',[LandlordController::class,'googleFunction'])->name('googleFunction');
    
    

    Route::get('AddTenants',[LandlordController::class,'AddTenants'])->name('AddTenants');
    Route::Post('AddTenants',[LandlordController::class,'RegTenants'])->name('RegTenants');
    Route::get('ViewTenants',[LandlordController::class,'ViewTenants'])->name('ViewTenants');
    Route::get('EditTenant/{id}',[LandlordController::class,'EditTenants'])->name('EditTenants');
    Route::post('updateTenant',[LandlordController::class,'updateTenant'])->name('UpdateTenant');

});

Route::prefix('tenant')->name('tenant.')->group(function(){

    Route::get('login',[TenantController::class,'login'])->name('login');
    Route::get('logout',[TenantController::class,'logout'])->name('logout');

    Route::get('register',[TenantController::class,'openRegPage'])->name('register');
    Route::post('register',[TenantController::class,'register'])->name('regLandlord');

    Route::get('loginGoogle',[TenantGoogleController::class,'loginwithgoogle'])->name('loginGoogle');
    Route::any('callback',[TenantGoogleController::class,'callbackFromGoogle'])->name('callback');

    Route::get('/', [TenantController::class, 'home'])->name('home');
    

});
Route::prefix('property')->name('property.')->group(function(){

    Route::post('filterProperty',[PropertyController::class,'doFilter'])->name('filterProperty');

});

Route::prefix('google')->name('google.')->group( function(){

    Route::get('/user/{id}', function ($id) {
        return 'User '.$id;
    });
    Route::get('/login/{id}',[GoogleController::class,'loginwithgoogle'])->name('login');
    Route::any('callback',[GoogleController::class,'callbackFromGoogle'])->name('callback');
});