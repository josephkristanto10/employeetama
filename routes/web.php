<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\LoginController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('Modernize.authentication-login');
});
Route::resource("Login",LoginController::class);
Route::post("checklogin", [LoginController::class,"login"])->name("checklogin");
Route::post("logout", [LoginController::class,"logout"])->name("logout");
Route::resource("Employee",EmployeeController::class);
Route::get("indexemployee", [EmployeeController::class,"index_add_employee"])->name("indexemployee");
Route::get("listemployee", [EmployeeController::class,"listemployee"])->name("listemployee");
Route::get("daftar_employee", [EmployeeController::class,"daftar_employee"])->name("daftar_employee");
Route::post("add_employee", [EmployeeController::class,"add_employee"])->name("add_employee");
Route::get("listsalary", [EmployeeController::class,"listsalary"])->name("listsalary");
Route::get("daftar_salary", [EmployeeController::class,"daftar_salary"])->name("daftar_salary");
Route::get("add_detail_salary", [EmployeeController::class,"add_detail_salary"])->name("add_detail_salary");
Route::post("add_detail_salaries", [EmployeeController::class,"add_detail_salaries"])->name("add_detail_salaries");
Route::post("add_month", [EmployeeController::class,"add_month"])->name("add_month");
Route::get("indexdetailsalary/{id}", [EmployeeController::class,"indexdetailsalary"])->name("indexdetailsalary");
Route::get("indexbonuspanen", [EmployeeController::class,"indexbonuspanen"])->name("indexbonuspanen");
Route::get("indexbonuspanen_live", [EmployeeController::class,"indexbonuspanenlive"])->name("indexbonuspanenlive");
Route::get("detailsalary", [EmployeeController::class,"detailsalary"])->name("detailsalary");
Route::get("listbonuspanen", [EmployeeController::class,"list_panen_bonus"])->name("listbonuspanen");
Route::get("listbonuspanen_hidup", [EmployeeController::class,"list_panen_bonus_hidup"])->name("listbonuspanen_hidup");
Route::get("listdetailbonuspanen", [EmployeeController::class,"list_detail_bonus_panen"])->name("listdetailbonuspanen");
Route::get("listdetailbonuspanen_hidup", [EmployeeController::class,"list_detail_bonus_panen_hidup"])->name("listdetailbonuspanen_hidup");

Route::post("add_master_bonus_panen_fresh", [EmployeeController::class,"add_master_bonus_panen_fresh"])->name("add_master_bonus_panen_fresh");
Route::post("add_master_bonus_panen", [EmployeeController::class,"add_master_bonus_panen_hidup"])->name("addmasterbonuspanen");
Route::post("add_bonus_panen", [EmployeeController::class,"add_bonus_panen"])->name("addbonuspanen");
Route::post("add_bonus_panen_live", [EmployeeController::class,"add_bonus_panen_live"])->name("addbonuspanen_live");