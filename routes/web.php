<?php

//use App\project;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;


Route::get('/', function(){
     return view('login');
});
Route::get('/login', function(){
     return view('login');
});
Route::get('/staff', function(){
     return view('stafflogin');
});
Route::get('/error403', function(){
     return view('page403');
});
Route::get('/error404', function(){
     return view('page404');
});
Route::get('/error500', function(){
     return view('page500');
});
Route::post('/loginSubmit', 'projectController@StudentAuthen');
Route::post('/staffLoginSubmit', 'projectController@StaffAuthen');


Route::group(['middleware' => 'student'], function () {
     Route::get('/student', 'projectController@studentAllProject');
     Route::get('/student/allproject', 'projectController@studentAllProject');
     Route::get('/student/addproject491', 'projectController@addProject491');
     Route::get('/student/addproject492', 'projectController@addProject492');
     Route::get('/student/myProject', 'projectController@myStudentProject');
     Route::get('/student/{id}', 'projectController@stdProjectDetail');
     Route::get('/student/viewProject/{id}', 'projectController@stdViewEditProject');
     Route::get('/student/{act}/{id}', 'projectController@stdActionProject');
     Route::post('/insertProject', 'projectController@ProjectSubmit');
});



//committee
Route::group(['middleware' => 'committee'], function () {
      Route::get('/committee', 'projectController@indexCommittee');
      Route::get('/committee/projectAdvisor', 'projectController@projectAdvisor');
      Route::get('/committee/projectCommittee', 'projectController@projectCommittee');
      Route::get('/committee/{id}', 'projectController@committeeProjectDetail');
      Route::get('/committee/edit/{id}', 'projectController@committeeEditProjecteDetail');
      Route::get('/committee/{id}/{status}', 'projectController@committeeApprove');
      Route::post('/committee/updateProject', 'projectController@committeeUpdateProject');

});


// TODO add middleware hardenning here
Route::get('/api/v1/projects', 'ProjectController@index');
Route::get('/api/v1/projects/{projectId}', 'ProjectController@view');
Route::get('/api/v1/projects/{projectId}/committees', 'ProjectCommitteeController@all');
Route::get('/api/v1/projects/{projectId}/committees/{committeeId}', 'ProjectCommitteeController@one');
Route::post('/api/v1/projects/{projectId}/committees', 'ProjectCommitteeController@create');
Route::delete('/api/v1/projects/{projectId}/committees/{committeeId}', 'ProjectCommitteeController@delete');



//admin
Route::get('/admin/allproject', 'projectController@selectAllProject');

?>
