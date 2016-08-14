<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\ClassName;
use App\ClassSubject;
use App\DataFile;
use App\DataFileType;
use App\Subject;
use App\WebsiteContent;
use App\UserDetails;
use App\TutorRegDetail;
use App\FeedbackGrade;
use App\Feedback;
use Illuminate\Support\Facades\Input;
use DB;
use App\UserSubject;
use App\UserType;
use App\ExamHelp;
use App\ExamHelpSubject;

class AdminController extends Controller
{
    public function index() {
        // $contents = WebsiteContent::all();
        $message="";
        $classes = ClassName::where('deleted','0')->get();
        $classSubjects = ClassSubject::where('id','>','0');
        $fileTypes = DataFileType::all();
        return view('backend.welcome',compact('message','classes','classSubjects','fileTypes'));
    }

    public function homeWithMessage($message) {
        // $contents = WebsiteContent::all();
        $classes = ClassName::where('deleted','0')->get();
        $classSubjects = ClassSubject::where('id','>','0');
        $fileTypes = DataFileType::all();
        return view('backend.welcome',compact('message','classes','classSubjects','fileTypes'));
    }

    public function storeFile(Request $request) {
        $file = new DataFile;
        $file->class_subject_id = $request->subject;
        $file->data_type_id = $request->data_file_type;
        $file->file_name = '1';
        $file->description = $request->description;
        $file->save();

        $fileName = $file->id.'.'.$request->file('file_chosen')->getClientOriginalExtension();
        $request->file('file_chosen')->move(base_path().'/public/material/',$fileName);
        DataFile::where('id',$file->id)->update(['file_name'=>$fileName]);

        $message="File Saved";
        return redirect()->route('homeWithMessage',$message);
    }

    public function showVistitors() {
        $search=0;
        $search_text="";
        $fromDate="";
        $toDate="";
        $rows = (Input::exists('rows'))?abs(Input::get('rows')): 15;        
        $page = (Input::exists('page'))? abs(Input::get('page')): 1;
        
        $visitors = UserDetails::latest()->paginate($rows);

        //Add form modal
        $classes = ClassName::where('deleted','0')->get();
        $classSubjects = ClassSubject::where('id','>','0');
        $fileTypes = DataFileType::all();
        // $userSubjects = UserSubject::all();
        $userSubjects = UserSubject::where('id','<>','-2')->get();
        $type = UserType::where('type','student')->value('id');
        
        
        return view('backend.visitors',compact('visitors','search','search_text','fromDate','toDate','rows','page','classes','classSubjects','fileTypes','userSubjects','type'));
    }

    public function filterVisitors(Request $request) {
        $rows = (Input::exists('rows'))?abs(Input::get('rows')): 15;
        $search=$request->search;
        $search_text=$request->search_text;
        $fromDate=$request->request_from_date;
        $toDate=$request->request_to_date;   
        $page = (Input::exists('page'))? abs(Input::get('page')): 1;

        if($search) {
            switch ($search) {
                case 1 :
                    $visitors = UserDetails::where('id',$search_text)->latest()->paginate($rows);
                    break;
                case 2 :
                    $visitors = UserDetails::where('first_name','like','%'.$search_text.'%')->latest()->paginate($rows);
                    break;
                case 3 :
                    $visitors = UserDetails::where('last_name','like','%'.$search_text.'%')->latest()->paginate($rows);
                    break;
                case 4 :
                    $visitors = UserDetails::where('contact','like','%'.$search_text.'%')->latest()->paginate($rows);
                    break;
                case 5 :
                    $visitors = UserDetails::where('email','like','%'.$search_text.'%')->latest()->paginate($rows);
                    break;
                case 6 :
                    $visitors = UserDetails::where('location','like','%'.$search_text.'%')->latest()->paginate($rows);
                    break;
                
                default:
                    $visitors = UserDetails::where('id','>','0')->latest()->paginate($rows);
                    break;
            }
        }
        else {
            $visitors = UserDetails::where('id','>','0')->latest()->paginate($rows);
        }
        
        $from_date_records = array();
        $to_date_records = array();
        foreach ($visitors as $key => $visitor) {
            if($fromDate){
              if($visitor->created_at <= $fromDate ){ 
                array_push($from_date_records, $key);
              }
            }
            if($toDate){
              if($visitor->created_at >= $toDate ){ 
                array_push($to_date_records, $key);
              }
            }       
        if(!empty($fromDate)){
          $visitors->forget($from_date_records);
        } 
        if(!empty($toDate))
          $visitors->forget($to_date_records);
        }   
        

        //Add form modal
        $classes = ClassName::where('deleted','0')->get();
        $classSubjects = ClassSubject::where('id','>','0');
        $fileTypes = DataFileType::all();
        
        $userSubjects = UserSubject::where('id','<>','-2')->get();
        $type = UserType::where('type','student')->value('id');
        
        
        return view('backend.visitors',compact('visitors','search','search_text','fromDate','toDate','rows','page','classes','classSubjects','fileTypes','userSubjects','type'));
    }


    public function showTutors() {
        $search=0;
        $search_text="";
        $fromDate="";
        $toDate="";
        $rows = (Input::exists('rows'))?abs(Input::get('rows')): 15;        
        $page = (Input::exists('page'))? abs(Input::get('page')): 1;
        
        $tutors = TutorRegDetail::latest()->paginate($rows);

        //Add form modal
        $classes = ClassName::where('deleted','0')->get();
        $classSubjects = ClassSubject::where('id','>','0');
        $fileTypes = DataFileType::all();
        
        // $userSubjects = UserSubject::where('user_id',$id)->lists('class_subject_id')->toArray();
        $userSubjects = UserSubject::where('id','<>','-2');
        $type = UserType::where('type','teacher')->value('id');
        
        
        return view('backend.reg-tutors-list',compact('tutors','search','search_text','fromDate','toDate','rows','page','classes','classSubjects','fileTypes','userSubjects','type'));
    }


    public function filterTutors(Request $request) {
        $rows = (Input::exists('rows'))?abs(Input::get('rows')): 15;
        $search=$request->search;
        $search_text=$request->search_text;
        $fromDate=$request->request_from_date;
        $toDate=$request->request_to_date;   
        $page = (Input::exists('page'))? abs(Input::get('page')): 1;

        if($search) {
            switch ($search) {
                case 1 :
                    $tutors = TutorRegDetail::where('id',$search_text)->latest()->paginate($rows);
                    break;
                case 2 :
                    $tutors = TutorRegDetail::where('first_name','like','%'.$search_text.'%')->latest()->paginate($rows);
                    break;
                case 3 :
                    $tutors = TutorRegDetail::where('last_name','like','%'.$search_text.'%')->latest()->paginate($rows);
                    break;
                case 4 :
                    $tutors = TutorRegDetail::where('qualification','like','%'.$search_text.'%')->latest()->paginate($rows);
                    break;
                case 5 :
                    $tutors = TutorRegDetail::where('contact','like','%'.$search_text.'%')->latest()->paginate($rows);
                    break;
                case 6 :
                    $tutors = TutorRegDetail::where('email','like','%'.$search_text.'%')->latest()->paginate($rows);
                    break;
                case 7 :
                    $visitors = UserDetails::where('location','like','%'.$search_text.'%')->latest()->paginate($rows);
                    break;
                
                default:
                    $tutors = TutorRegDetail::where('id','>','0')->latest()->paginate($rows);
                    break;
            }
        }
        else {
            $tutors = TutorRegDetail::where('id','>','0')->latest()->paginate($rows);
        }
        
        $from_date_records = array();
        $to_date_records = array();
        foreach ($tutors as $key => $tutor) {
            if($fromDate){
              if($tutor->created_at <= $fromDate ){ 
                array_push($from_date_records, $key);
              }
            }
            if($toDate){
              if($tutor->created_at >= $toDate ){ 
                array_push($to_date_records, $key);
              }
            }       
        if(!empty($fromDate)){
          $tutors->forget($from_date_records);
        } 
        if(!empty($toDate))
          $tutors->forget($to_date_records);
        }   
        

        //Add form modal
        $classes = ClassName::where('deleted','0')->get();
        $classSubjects = ClassSubject::where('id','>','0');
        $fileTypes = DataFileType::all();
        

        $userSubjects = UserSubject::where('id','<>','-2')->get();
        $type = UserType::where('type','teacher')->value('id');
        
        
        return view('backend.reg-tutors-list',compact('tutors','search','search_text','fromDate','toDate','rows','page','classes','classSubjects','fileTypes','userSubjects','type'));
        
        // return view('backend.reg-tutors-list',compact('tutors','search','search_text','fromDate','toDate','rows','page','classes','classSubjects','fileTypes'));
    }

    public function showExamHelpQueries()
    {
        $classes = ClassName::where('deleted','0')->get();
        $classSubjects = ClassSubject::where('id','>','0');
        $fileTypes = DataFileType::all();
        
        $examHelps =  ExamHelp::latest()->paginate();  
        $visitor = array();

  //       foreach ($examHelps as $help) {
  //           $visitor = $help->getVisitor->id;
  //           $topics = $help->getHelpSubjects();
  //       }

        
  // dd($visitor);   
        
        return view('backend.exam-help-list',compact('examHelps','classes','classSubjects','fileTypes'));
    }

    public function showFeedbacks() {
        $classes = ClassName::where('deleted','0')->get();
        $fileTypes = DataFileType::all();

        $feedbacks = Feedback::all();
        return view('backend.view_feedback',compact('feedbacks','fileTypes','classes'));
    }

    public function acceptFeedback($id) {
        Feedback::where('id',$id)->update(['at_front'=>'1']);
        return redirect()->back();
    }

    public function removeFeedback($id) {
        Feedback::where('id',$id)->update(['at_front'=>'0']);
        return redirect()->back();
    }

    public function showClasses() {
        //Add form modal
        $classes = ClassName::all();
        $classSubjects = ClassSubject::all();
        $fileTypes = DataFileType::all(); 
        $subjects = Subject::where('deleted','0')->lists('name','id')->toArray();       
        // dd($subjects);
        return view('backend.classes',compact('classes','classSubjects','fileTypes','subjects'));
    }

    public function removeClass($id)
    {
        ClassName::where('id',$id)->update(['deleted' => '1']);
        return redirect()->back();
    }

    public function addBackClass($id)
    {
        ClassName::where('id',$id)->update(['deleted' => '0']);
        return redirect()->back();
    }

    public function addSubjects($id)
    {
        $subjects = Input::get('addSub');
        foreach ($subjects as $key => $value) {
            $subject = ClassSubject::where('class_id',$id)->where('subject_id',$value)->value('id');
            if($subject) {
                ClassSubject::where('id',$subject)->update(['deleted' => '0']);
                // dd($subject.'inif');
            }
            else {
                $subject = new ClassSubject;
                $subject->class_id = $id;
                $subject->subject_id = $value;
                $subject->save();
                // dd($subject.'inelse');
            }                
        }
        return redirect()->back();
    }

    public function removeSubjects(Request $request, $id)
    {
        $subjects = Input::get('removeSub');
        foreach ($subjects as $key => $value) {
            ClassSubject::where('class_id',$id)->where('subject_id',$value)->update(['deleted' => '1']);
        }
        return redirect()->back();
    }

    public function addNewClass(Request $request)
    {
        $name = Input::get('new_class');
        $new_class = ClassName::create(['name' => $name]);
        if (Input::has('addSubjectsInClass')) {
            $subjects = Input::get('addSubjectsInClass');
            foreach ($subjects as $key => $value) {
                $subject = new ClassSubject;
                $subject->class_id = $new_class->id;
                $subject->subject_id = $value;
                $subject->save();
            }                
        }
        return redirect()->back();
    }

    public function addNewSubject(Request $request)
    {
        $name = Input::get('new_subject');
        $new_subject = Subject::create(['name' => $name]);
        if (Input::has('addInClass')) {
            $classes = Input::get('addInClass');
            foreach ($classes as $key => $value) {
                $subject = new ClassSubject;
                $subject->class_id = $value;
                $subject->subject_id = $new_subject->id;
                $subject->save();
            }                
        }
        return redirect()->back();
    }



    //Not in use yet
    public function changeContentLoad($id) {
    	$content = WebsiteContent::find($id);
   		return view('backend.content_show',compact('content'));
    }

    public function changeContent(Request $request, $id) {
    	MainContent::where('title_id',ContentTitles::where('title_name','AboutUs')->value('id'))->update(['content' => $request->aboutUsContent]);
   		return "updated";
    }
}
