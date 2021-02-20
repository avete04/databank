<?php

use Illuminate\Support\Facades\Route;

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


//department
Route::post('/add_department', 'DepartmentController@add_department')->name('department.create');
Route::post('/get_department', 'DepartmentController@get_department')->name('department.get');
Route::post('/update_department', 'DepartmentController@update_department')->name('department.update');
Route::post('/delete_department', 'DepartmentController@delete_department')->name('department.delete');
Route::get('/get_all_department', 'DepartmentController@get_all_department')->name('department.get_all');

//designation
Route::post('/add_designation', 'DesignationController@add_designation')->name('designation.create');
Route::post('/get_designation', 'DesignationController@get_designation')->name('designation.get');
Route::post('/update_designation', 'DesignationController@update_designation')->name('designation.update');
Route::post('delete_designation', 'DesignationController@delete_designation')->name('designation.delete');

Route::prefix('employee')->group(function(){
    //employee
    Route::post('/add_employee', 'EmployeeController@add_employee')->name('employee.create');
    Route::get('/get_all_employee', 'EmployeeController@get_all_employee')->name('employee.get_all');
    Route::post('/get_employee', 'EmployeeController@get_employee')->name('employee.get');
    Route::post('/update_employee', 'EmployeeController@update_employee')->name('employee.update');
    Route::post('/delete_employee', 'EmployeeController@delete_employee')->name('employee.delete');
});

Route::post('/add_personal_info', 'PersonalInfoController@add_personal_info')->name('personal_info.create');
Route::post('/get_personal_info', 'PersonalInfoController@get_personal_info')->name('personal_info.get');

Route::post('/authenticate', 'LoginController@authenticate')->name('authenticate');

Route::post('/add_emergency_contact', 'EmergencyContactController@add')->name('emergency_contact.add');
Route::get('/get_emergency_contact/{id}', 'EmergencyContactController@get')->name('emergency_contact.get');

Route::post('/add_family_info', 'FamilyInfoController@add')->name('family_info.add');
Route::get('/get_family_info', 'FamilyInfoController@get')->name('family_info.get');
Route::post('/update_family_info', 'FamilyInfoController@update')->name('family_info.update');


Route::middleware('auth')->group(function(){

    Route::get('/', function () {
        return view('employees');
    });
    
    Route::get('/home', function () {
        return view('employees');
    });
    
    Route::get('/index', function () {
        return view('employees');
    })->name('page');
    
    Route::get('/employees', function () {
        return view('employees');
    })->name('employees');

    
    Route::get('/departments', function () {
        return view('departments');
    });
    Route::get('/designations', function () {
        return view('designations');
    });
    Route::get('/performance', function () {
        return view('performance');
    });
    Route::get('/performance-appraisal', function () {
        return view('performance-appraisal');
    });
    Route::get('/promotion', function () {
        return view('promotion');
    });
    Route::get('/profile', function () {
        return view('profile');
    });
    Route::get('/resignation', function () {
        return view('resignation');
    });
    Route::get('/termination', function () {
        return view('termination');
    });
    Route::get('/users', function () {
        return view('users');
    });

    Route::get('/employees-list', function () {
        return view('employees-list');
    });

    Route::get('/search', function () {
        return view('search');
    });
});

Route::get('/logout', 'LoginController@logout')->name('logout');


Route::get('/login', function () {
    return view('login');
})->name('login');

Route::get('/register', function () {
    return view('register');
});
Route::get('/error-404', function () {
    return view('error-404');
});
Route::get('/error-500', function () {
    return view('error-500');
});

