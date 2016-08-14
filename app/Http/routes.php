<?php
// Models
use App\Subject;
use App\ClassSubject;
use App\UserSubject;
use App\ClassName;
use App\User;

// Other imports
use Illuminate\Support\Facades\Input;
use App\Http\Controllers\VisitorController;
use Illuminate\Support\Facades\Crypt;

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', ['as' => 'welcome', 'uses' => 'VisitorController@index']);


Route::get('/2', ['as' => 'welcome', 'uses' => 'VisitorController@index2']);

// Route::get('/login', ['as' => 'login', 'uses' => 'VisitorController@index']);


Route::get('/home', ['as' => 'welcome', 'uses' => 'VisitorController@index']);

Route::get('login', ['middleware' =>['guest'], 'as' => 'login' ,'uses' => 'Auth\AuthController@getLogin']);
// Route::get('logout', ['middleware' =>['guest'] ,'uses' => 'Auth\AuthController@getLogout']);
Route::get('logout', ['as' => 'logout', 'uses' => 'Auth\AuthController@logout']);

Route::post('login', 'Auth\AuthController@postLogin');

//Routes without login
Route::post('/register/student', [ 'as' => 'createUser', 'uses' => 'VisitorController@createUser']);
Route::post('/register/teacher', [ 'as' => 'createTutor', 'uses' => 'VisitorController@createTutor']);
Route::get('/view-feedback/', [ 'as' => 'viewFeedback', 'uses' => 'VisitorController@viewFeedbacks']);
Route::get('/class/{classId}', [ 'as' => 'showClasswise', 'uses' => 'VisitorController@showClasswise']);



Route::group(['middleware'=>'auth'], function(){
	// Route::get('/syllabus/{$subjectId}', ['as' => 'syllabus', 'uses' => 'VisitorController@index']);
	Route::get('/samplePapers/{subjectId}', ['as' => 'samplePapers', 'uses' => 'VisitorController@samplePapers']);
	// // Route::get('/samplePapers/{$subjectId}', ['as' => 'samplePapers', 'uses' => function ($subjectId) {
	// 	    return "hi";
	// 	}]);
	Route::get('/syllabus/{subjectId}', ['as' => 'syllabus', 'uses' => 'VisitorController@syllabus']);
	Route::get('/prevYearPapers/{subjectId}', ['as' => 'prevYearPapers', 'uses' => 'VisitorController@prevYearPapers']);
	Route::get('/keyNotes/{subjectId}', ['as' => 'keyNotes', 'uses' => 'VisitorController@keyNotes']);
	Route::get('/refMaterial/{subjectId}', ['as' => 'refMaterial', 'uses' => 'VisitorController@refMaterial']);

	Route::get('/profile', [ 'as' => 'showProfile', 'uses' => 'VisitorController@showProfile']);

	Route::post('/change-password/{type}', [ 'as' => 'changePassword', 'uses' => 'VisitorController@changePassword']);
	Route::post('/update/student', [ 'as' => 'updateStudent', 'uses' => 'VisitorController@updateStudent']);
	Route::post('/update/teacher', [ 'as' => 'updateTeacher', 'uses' => 'VisitorController@updateTeacher']);
	Route::get('/feedback', [ 'as' => 'getFeedback', 'uses' => 'VisitorController@getFeedback']);
	Route::post('/feedback', [ 'as' => 'storeFeedback', 'uses' => 'VisitorController@storeFeedback']);
	Route::post('/exam-time-help', [ 'as' => 'storeExamTimeHelp', 'uses' => 'VisitorController@storeExamTimeHelp']);
});

Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'admin']], function() {
	Route::get('/', ['as' => 'adminHome', 'uses' => 'AdminController@index']);
	Route::get('/visitor-list', ['as' => 'viewVisitors', 'uses' => 'AdminController@showVistitors']);
	Route::get('/visitor-list/filter', ['as' => 'adminFilterVisitors', 'uses' => 'AdminController@filterVisitors']);
	Route::get('/tutors-list', ['as' => 'viewTutors', 'uses' => 'AdminController@showTutors']);
	Route::get('/tutors-list/filter', ['as' => 'adminFilterTutors', 'uses' => 'AdminController@filterTutors']);
	Route::get('/content', ['as' => 'contentShow', 'uses' => 'AdminController@changeContentLoad']);
	Route::get('/changeContent/{id}', ['as' => 'changeContentLoad', 'uses' => 'AdminController@changeContentLoad']);
	Route::post('/changeContent/{id}', ['as' => 'changeContent', 'uses' => 'AdminController@changeContent']);
	Route::get('/view-feedbacks', ['as' => 'showFeedbacks', 'uses' => 'AdminController@showFeedbacks']);
	Route::get('/feedback/accept/{id}', ['as' => 'acceptFeedback', 'uses' => 'AdminController@acceptFeedback']);
	Route::get('/feedback/remove/{id}', ['as' => 'removeFeedback', 'uses' => 'AdminController@removeFeedback']);
	Route::get('/exam-time-help', ['as' => 'removeFeedback', 'uses' => 'AdminController@showExamHelpQueries']);
	Route::get('/classes', ['as' => 'showClasses', 'uses' => 'AdminController@showClasses']);
	Route::get('/class/remove/{id}', ['as' => 'removeClass', 'uses' => 'AdminController@removeClass']);
	Route::get('/class/add-back/{id}', ['as' => 'addBackClass', 'uses' => 'AdminController@addBackClass']);

	Route::post('/class/add-class', ['as' => 'addNewClass', 'uses' => 'AdminController@addNewClass']);
	Route::post('/class/add-subject', ['as' => 'addNewSubject', 'uses' => 'AdminController@addNewSubject']);
	Route::post('/class/add-subjects/{id}', ['as' => 'addSubjects', 'uses' => 'AdminController@addSubjects']);
	Route::post('/class/remove-subjects/{id}', ['as' => 'removeSubjects', 'uses' => 'AdminController@removeSubjects']);
	Route::post('/store-file', ['as' => 'storeFile', 'uses' => 'AdminController@storeFile']);
	Route::get('message/{message}', ['as' => 'homeWithMessage', 'uses' => 'AdminController@homeWithMessage']);
});



Route::get('/ajax-subject', function() {
	$class_id = Input::get('class_id');
	// $subjects = ClassSubject::where('class_id',$class_id)->getSubjects()->get();
	$subjects = DB::table('class_subjects')
				->where('class_id',$class_id)
				->select('class_subjects.id','subjects.name')
				->join('subjects','subjects.id','=','class_subjects.subject_id')
				->get();
	return Response::json($subjects);
});


Route::get('/map', function() {
	return view('frontend.map');
});

// Route::auth();

// Route::get('/home', 'HomeController@index');


// Route::get('/email/{}', function() {
// 	Mail::send('emails.test', ['name' => 'SShiksha'], function($message) {
// 		$message->to('aggarwalmeghana08@gmail.com', 'Shiksha')->subject('Welcome!');
// 	});
// });




Route::get('/email/{id}', ['as' => 'email', 'uses' => function($id) {
	$user = User::find($id);
	$class_sub_ids = UserSubject::where('user_id',$user->id)->where('class_subject_id','>','0')->lists('class_subject_id')->toArray();
	$classes = array();
	$leftClasses = UserSubject::where('user_id',$user->id)->where('class_subject_id','-1')->lists('other_class')->toArray();
	foreach ($class_sub_ids as $id) {
		$class_id = ClassSubject::where('id',$id)->value('class_id');
		$key = ClassName::where('id',$class_id)->value('name');
		$subject_ids = ClassSubject::where('id',$id)->lists('subject_id')->toArray();
		foreach ($subject_ids as $id) {
			$classes[$key][] = Subject::where('id',$id)->value('name');
		}
		// other subject of a class
		$classes[$key][] = UserSubject::where('user_id',$user->id)->where('class_subject_id','-1')->where('other_class',$class_id)->value('other_subject');
		$leftClasses = array_diff($leftClasses, array($class_id));
		$classes[$key] = array_unique($classes[$key]);
	}

	// other subject in empty class
	$class_sub_ids = UserSubject::where('user_id',$user->id)->where('class_subject_id','-1')->whereIn('other_class',$leftClasses)->lists('other_subject','other_class')->toArray();
	foreach ($class_sub_ids as $key => $value) {
		$classes[$key][] = $value;
	}

	// other class
	$class_sub_ids = UserSubject::where('user_id',$user->id)->where('class_subject_id','0')->lists('other_subject','other_class')->toArray();
	foreach ($class_sub_ids as $key => $value) {
		$classes[$key][] = $value;
	}
	
	Mail::send('emails.test', ['type' => $user->memberType->type,'name' => $user->getMember->first_name.' '.$user->getMember->last_name, 'contact' => $user->getMember->contact, 'classes'=>$classes], function($message) {
		$message->to('aggarwalmeghana08@gmail.com', 'Shiksha')->subject('Registration Done!');
	});

    $message = "Thankyou !!<br/>Your username : ".$user->email."<br/>Password : 123456";
    return VisitorController::confirm($message);
}]);

Route::get('/email-help/{id}', ['as' => 'emailExamHelp', 'uses' => function($id) {
	$help = \App\ExamHelp::find($id);
	$user = \App\UserDetails::find($help->getVisitor->id);
	$topics = \App\ExamHelpSubject::where('help_id',$help->id)->lists('other_subject','topic')->toArray();

	Mail::send('emails.exam-help', ['name' => $user->first_name.' '.$user->last_name, 'contact' => $user->contact, 'class'=>$user->class, 'topics' => $topics], function($message) {
		$message->to('aggarwalmeghana08@gmail.com', 'Shiksha')->subject('Exam Time Help Query!');
	});

    $message = "Thankyou !! Will get back to you soon.";
    return VisitorController::confirm($message);
}]);