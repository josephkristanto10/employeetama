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
Route::get("indexbonuspanen_pekerjaan", [EmployeeController::class,"indexbonuspanenpekerjaan"])->name("indexbonuspanen_pekerjaan");
Route::get("detailsalary", [EmployeeController::class,"detailsalary"])->name("detailsalary");
Route::get("listbonuspanen", [EmployeeController::class,"list_panen_bonus"])->name("listbonuspanen");
Route::get("listbonuspanen_hidup", [EmployeeController::class,"list_panen_bonus_hidup"])->name("listbonuspanen_hidup");
Route::get("list_bonus_panen_pekerjaan", [EmployeeController::class,"list_bonus_panen_pekerjaan"])->name("list_bonus_panen_pekerjaan");

Route::get("listdetailbonuspanen", [EmployeeController::class,"list_detail_bonus_panen"])->name("listdetailbonuspanen");
Route::get("listdetailbonuspanen_hidup", [EmployeeController::class,"list_detail_bonus_panen_hidup"])->name("listdetailbonuspanen_hidup");
Route::get("listdetailbonuspanenperkerjaan", [EmployeeController::class,"listdetailbonuspanenperkerjaan"])->name("listdetailbonuspanenperkerjaan");

Route::post("add_master_bonus_panen_pekerjaan", [EmployeeController::class,"add_master_bonus_panen_pekerjaan"])->name("add_master_bonus_panen_pekerjaan");
Route::post("add_master_bonus_panen_fresh", [EmployeeController::class,"add_master_bonus_panen_fresh"])->name("add_master_bonus_panen_fresh");
Route::post("add_master_bonus_panen", [EmployeeController::class,"add_master_bonus_panen_hidup"])->name("addmasterbonuspanen");
Route::post("add_bonus_panen", [EmployeeController::class,"add_bonus_panen"])->name("addbonuspanen");
Route::post("add_bonus_panen_live", [EmployeeController::class,"add_bonus_panen_live"])->name("addbonuspanen_live");
Route::post("add_mastermonth_bonus_panen_pekerjaan", [EmployeeController::class,"add_mastermonth_bonus_panen_pekerjaan"])->name("add_mastermonth_bonus_panen_pekerjaan");


Route::post("change_status_list_salary", [EmployeeController::class,"change_status_list_salary"])->name("changestatus_list_salary");
Route::post("change_status_bonus_panen", [EmployeeController::class,"change_status_bonus_panen"])->name("change_status_bonus_panen");
Route::post("change_status_bonus_panen_live", [EmployeeController::class,"change_status_bonus_panen_live"])->name("change_status_bonus_panen_live");
Route::post("change_status_bonus_panen_pekerjaan", [EmployeeController::class,"change_status_bonus_panen_pekerjaan"])->name("change_status_bonus_panen_pekerjaan");

Route::post("delete_row_detail_salary", [EmployeeController::class,"delete_row_detail_salary"])->name("delete_row_detail_salary");
Route::post("delete_row_detail_bonus_panen", [EmployeeController::class,"delete_row_detail_bonus_panen"])->name("delete_row_detail_bonus_panen");
Route::post("delete_row_detail_bonus_panen_live", [EmployeeController::class,"delete_row_detail_bonus_panen_live"])->name("delete_row_detail_bonus_panen_live");
Route::post("delete_row_detail_bonus_panen_pekerjaan", [EmployeeController::class,"delete_row_detail_bonus_panen_pekerjaan"])->name("delete_row_detail_bonus_panen_pekerjaan");