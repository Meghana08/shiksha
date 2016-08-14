<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\UserDetails;
use App\ClassName;
use App\ClassSubject;
use App\DataFile;
use App\DataFileType;
use App\Subject;
use App\WebsiteContent;
use App\TutorRegDetail;
use Illuminate\Support\Facades\Input;
use DB;
use App\Http\Controllers\Auth\AuthController;
use Auth;
use App\User;
use Illuminate\Support\Facades\Redirect;
use App\UserType;
use App\FeedbackGrade;
use App\Feedback;
use App\UserSubject;
use App\ExamHelp;
use App\ExamHelpSubject;


class VisitorController extends Controller
{
    public function index() {
        $classes = ClassName::all();
        
        $content = array();
        $wbContents = WebsiteContent::all();

        if( sizeof($wbContents) > 0 ) {
            foreach ($wbContents as $key => $value) {
                $content[$value->title] = $value->content;
            }
        }

        // $userSubjects = array();
        // if(!Auth::guest()) {
        //     $userSubjects = UserSubject::where('class_subject_id','>','0')->where('user_id',Auth::user()->id)->where('user_type_id','2')
        // }

        // dd($content);
        return view('frontend.welcome',compact('classes','content'));
        // return view('welcome',compact('classes','content'));
    }

    public function index2() {
        $classes = ClassName::all();
        
        $content = array();
        $wbContents = WebsiteContent::all();

        if( sizeof($wbContents) > 0 ) {
            foreach ($wbContents as $key => $value) {
                $content[$value->title] = $value->content;
            }
        }

        // $userSubjects = array();
        // if(!Auth::guest()) {
        //     $userSubjects = UserSubject::where('class_subject_id','>','0')->where('user_id',Auth::user()->id)->where('user_type_id','2')
        // }

        // dd($content);
        return view('frontend.welcomePrevDesign',compact('classes','content'));
        // return view('welcome',compact('classes','content'));
    }

    public function createUser(Request $request) {        
        $type = UserType::where('type','student')->value('id');
        
        $user = new UserDetails;
        $user->first_name = $request->f_name;
        $user->last_name = $request->l_name;
        $user->contact = $request->contact;
        $user->institute = $request->institute;
        $user->email = $request->email;
        $user->message = $request->message;
        $user->house_no = $request->house;
        $user->location = $request->location;
        $user->institute = $request->institute;
        $user->save();

        $data = array('member_id'=>$user->id, 'name'=>$request->f_name, 'email'=>'student@', 'password'=>'123456', 'type_id'=>$type);
        $user1 = AuthController::create($data);
        User::where('id',$user1->id)->update(['email' => $request->f_name.'@'.$user1->id]);

        if(!is_null(Input::get('otherClass'))) {
            $userSubject = new UserSubject;
            $userSubject->user_id = $user1->id;
            $userSubject->user_type_id = $type;
            $userSubject->class_subject_id  = '0';
            $userSubject->other_class = Input::get('otherClass');
            $userSubject->other_subject = Input::get('otherSubject');
            $userSubject->save(); 
        }
        if(!is_null(Input::get('otherClassSubject'))) {
            $userSubject = new UserSubject;
            $userSubject->user_id = $user1->id;
            $userSubject->user_type_id = $type;
            $userSubject->class_subject_id  = '-1';
            $userSubject->other_class = Input::get('class');
            $userSubject->other_subject = Input::get('otherClassSubject');
            $userSubject->save(); 
        }
        $subjects = $request->subject;
        if (!is_null($subjects)) {
            foreach ($subjects as $subject) {
                $userSubject = new UserSubject;
                $userSubject->user_id = $user1->id;
                $userSubject->user_type_id = $type;
                $userSubject->class_subject_id  = $subject;
                $userSubject->save(); 
            }
        }            

        return redirect()->route('email', array('user' => $user1->id));
    }

    public function createTutor(Request $request) {
        $type = UserType::where('type','teacher')->value('id');
        $tutor = new TutorRegDetail;
        $tutor->first_name = $request->f_name;
        $tutor->last_name = $request->l_name;
        $tutor->contact = $request->contact;
        $tutor->email = $request->email;
        $tutor->qualification = $request->qualification;
        $tutor->house_no = $request->house;
        $tutor->location = $request->location;
        $tutor->message = $request->message;
        $tutor->preferred_location = $request->preferred_location;
        $tutor->save();

        if(!is_null(Input::file('resume'))) {
            $fileName = $tutor->id.'.'.Input::file('resume')->getClientOriginalExtension();
            Input::file('resume')->move(base_path().'/public/tutor_resume/',$fileName);
            TutorRegDetail::where('id',$tutor->id)->update(['resume'=>$fileName]);
        }

        $data = array('member_id'=>$tutor->id, 'name'=>$request->f_name, 'email'=>'teacher@', 'password'=>'123456', 'type_id'=>$type);
        $user1 = AuthController::create($data);
        User::where('id',$user1->id)->update(['email' => $request->f_name.'@'.$user1->id]);

        $rownum = $request->rownum;
        for ($i=0; $i < $rownum; $i++) {
            if(Input::has('otherClass'.$i)) {
                $userSubject = new UserSubject;
                $userSubject->user_id = $user1->id;
                $userSubject->user_type_id = $type;
                $userSubject->class_subject_id  = '0';
                $userSubject->other_class = Input::get('otherClass'.$i);
                $userSubject->other_subject = Input::get('otherSubject'.$i);
                $userSubject->save(); 
            }
            if(!is_null(Input::get('otherClassSubject'.$i))) {
                $userSubject = new UserSubject;
                $userSubject->user_id = $user1->id;
                $userSubject->user_type_id = $type;
                $userSubject->class_subject_id  = '-1';
                $userSubject->other_class = Input::get('class'.$i);
                $userSubject->other_subject = Input::get('otherClassSubject'.$i);
                $userSubject->save(); 
            }
            $subjects = Input::get('subject'.$i);
            if (!is_null($subjects)) {
                foreach ($subjects as $subject) {
                    $userSubject = new UserSubject;
                    $userSubject->user_id = $user1->id;
                    $userSubject->user_type_id = $type;
                    $userSubject->class_subject_id  = $subject;
                    $userSubject->save(); 
                }
            }        
        }

        return redirect()->route('email', array('user' => $user1->id));
    }

    public function showProfile() {
        $otherNum = 0;
        $otherClass = null;
        $otherSubject = null;
        $otherClassSubject = null;


        $classes = ClassName::all();
        $id = Auth::user()->id;
        $type = UserType::where('id',User::where('id',$id)->value('type_id'))->value('type');
        $member_id = Auth::user()->member_id; 
        if(!strcmp($type, 'student')) {
            $user = UserDetails::find($member_id);
        } else {
            $user = TutorRegDetail::find($member_id);
        }

        if(!strcmp($type, 'student')) {
            $a = UserSubject::where('user_id',$id)->where('class_subject_id','0')->first();
            if(!is_null($a)) {
                $userClassID = ClassSubject::where('id', UserSubject::where('user_id',$id)->where('class_subject_id','>','0')->value('class_subject_id'))->value('class_id');
                if(!is_null($userClassID)) {
                    $subjects = ClassSubject::where('class_id',$userClassID)->get();
                    $userSubjects = UserSubject::where('user_id',$id)->where('class_subject_id','>','0')->lists('class_subject_id')->toArray();
                    $otherClassSubject = UserSubject::where('user_id',$id)->where('class_subject_id','0')->value('other_subject');
                } else {

                    $otherClass = UserSubject::where('user_id',$id)->where('class_subject_id','0')->value('other_class');
                    $otherSubject = UserSubject::where('user_id',$id)->where('class_subject_id','0')->value('other_subject');
                }
            } else {
                $userClassID = ClassSubject::where('id', UserSubject::where('user_id',$id)->where('class_subject_id','>','0')->value('class_subject_id'))->value('class_id');
                $subjects = ClassSubject::where('class_id',$userClassID)->get();
                $userSubjects = UserSubject::where('user_id',$id)->lists('class_subject_id')->toArray();
                $otherClassSubject = UserSubject::where('user_id',$id)->where('class_subject_id','-1')->value('other_subject');
            }
        } else {


            $a = UserSubject::where('user_id',$id)->where('class_subject_id','0')->get();
            if(!is_null($a)) {
                
                //other classes
                $userClassID = UserSubject::where('user_id',$id)->where('class_subject_id','0')->lists('id');
                foreach ($userClassID as $cid => $class_id) {
                    $otherClass[$otherNum] = UserSubject::where('user_id',$id)->where('id',$class_id)->value('other_class');
                    $otherSubject[$otherNum] = UserSubject::where('user_id',$id)->where('id',$class_id)->value('other_subject');
                    $otherNum++;
                }

                //not other class
                $userClassID =ClassSubject::whereIn('id', UserSubject::where('user_id',$id)->where('class_subject_id','>','0')->lists('class_subject_id'))->groupBy('class_id')->lists('class_id')->toArray();

                foreach ($userClassID as $cid => $class_id) {
                    $subjects[$cid] = ClassSubject::where('class_id',$class_id)->get();
                    $otherClassSubject[$cid] = UserSubject::where('user_id',$id)->where('class_subject_id','-1')->where('other_class',$class_id)->value('other_subject');
                }
                $userSubjects = UserSubject::where('user_id',$id)->where('class_subject_id','>','0')->lists('class_subject_id')->toArray();
            } else {
                $userClassID = ClassSubject::whereIn('id', UserSubject::where('user_id',$id)->lists('class_subject_id'))->groupBy('class_id')->lists('class_id')->toArray();
                foreach ($userClassID as $cid => $class_id) {
                    $subjects[$cid] = ClassSubject::where('class_id',$class_id)->get();
                }
                $userSubjects = UserSubject::where('user_id',$id)->lists('class_subject_id')->toArray();
            }
        }        
        return view('frontend.profile',compact('user','type','subjects','classes','userClassID','userSubjects','otherClass','otherSubject','otherClassSubject','otherNum'));
    }

    public function updateStudent(Request $request) {
        $id = Auth::user()->member_id;
        $user = UserDetails::find($id);
        $user->first_name = Input::get('f_name');
        $user->last_name = Input::get('l_name');
        $user->contact = Input::get('contact');
        $user->institute = Input::get('institute');
        $user->email = Input::get('email');
        $user->message = Input::get('message');
        $user->house_no = Input::get('house');
        $user->location = Input::get('location');
        $user->save();

        User::where('id', Auth::user()->id)->update(['name' => Input::get('f_name')]);

        UserSubject::where('user_id',Auth::user()->id)->delete();

        if(!is_null(Input::get('otherClass'))) {
            $userSubject = new UserSubject;
            $userSubject->user_id = $user1->id;
            $userSubject->user_type_id = Auth::user()->user_type_id;
            $userSubject->class_subject_id  = '0';
            $userSubject->other_class = Input::get('otherClass');
            $userSubject->other_subject = Input::get('otherSubject');
            $userSubject->save(); 
        }
        if(!is_null(Input::get('otherClassSubject'))) {
            $userSubject = new UserSubject;
            $userSubject->user_id = $user1->id;
            $userSubject->user_type_id = Auth::user()->user_type_id;
            $userSubject->class_subject_id  = '-1';
            $userSubject->other_class = Input::get('class');
            $userSubject->other_subject = Input::get('otherClassSubject');
            $userSubject->save(); 
        }
        $subjects = $request->subject;
        if (!is_null($subjects)) {
            foreach ($subjects as $subject) {
                $userSubject = new UserSubject;
                $userSubject->user_id = $user1->id;
                $userSubject->user_type_id = Auth::user()->user_type_id;
                $userSubject->class_subject_id  = $subject;
                $userSubject->save(); 
            }
        }       

        $message = "Profile Updated!!";
        return $this->confirm($message);
    }

    public function updateTeacher(Request $request) {
        $id = Auth::user()->member_id;
        $user = TutorRegDetail::find($id);
        $user->first_name = $request->f_name;
        $user->last_name = $request->l_name;
        $user->contact = $request->contact;
        $user->email = $request->email;
        $user->qualification = $request->qualification;
        $user->house_no = $request->house;
        $user->location = $request->location;
        $user->message = $request->message;
        $user->preferred_location = $request->preferred_location;
        $user->save();

        if(!is_null(Input::file('resume'))) {
            $fileName = $user->id.'.'.Input::file('resume')->getClientOriginalExtension();
            Input::file('resume')->move(base_path().'/public/tutor_resume/',$fileName);
            TutorRegDetail::where('id',$user->id)->update(['resume'=>$fileName]);
        }

        User::where('id', Auth::user()->id)->update(['name' => Input::get('f_name')]);

        UserSubject::where('user_id',Auth::user()->id)->delete();

        $rownum = $request->rownum;
        for ($i=0; $i < $rownum; $i++) {
            if(Input::has('otherClass'.$i)) {
                $userSubject = new UserSubject;
                $userSubject->user_id = Auth::user()->id;
                $userSubject->user_type_id = Auth::user()->type_id;
                $userSubject->class_subject_id  = '0';
                $userSubject->other_class = Input::get('otherClass'.$i);
                $userSubject->other_subject = Input::get('otherSubject'.$i);
                $userSubject->save(); 
            }
            if(!is_null(Input::get('otherClassSubject'.$i))) {
                $userSubject = new UserSubject;
                $userSubject->user_id = Auth::user()->id;
                $userSubject->user_type_id = Auth::user()->type_id;
                $userSubject->class_subject_id  = '-1';
                $userSubject->other_class = Input::get('class'.$i);
                $userSubject->other_subject = Input::get('otherClassSubject'.$i);
                $userSubject->save(); 
            }
            $subjects = Input::get('subject'.$i);
            if (!is_null($subjects)) {
                foreach ($subjects as $subject) {
                    $userSubject = new UserSubject;
                    $userSubject->user_id = Auth::user()->id;
                    $userSubject->user_type_id = Auth::user()->type_id;
                    $userSubject->class_subject_id  = $subject;
                    $userSubject->save(); 
                }
            }        
        }

        $message = "Profile Updated!!";
        return $this->confirm($message);
    }

    public function showClasswise($className) {
        $classId = ClassName::where('name',$className)->value('id');

        $isHome = false;
        $classes = ClassName::all();
        $subjects = ClassSubject::where('class_id',$classId)->get();
        $dataFileTypes = DataFileType::all();
        $className = ClassName::where('id',$classId)->value('name');
        return view('frontend.class_main',compact('className','subjects','dataFileTypes','classes','isHome'));
    }

    public function syllabus($subjectId) {
        $isHome = false;
        $classes = ClassName::all();
        $papers = DataFile::where('class_subject_id',$subjectId)->where('data_type_id', DataFileType::where('type', 'Syllabus')->value('id'))->get();
        $type = 'Syllabus';
        return view('frontend.material',compact('type','papers','isHome','classes'));
    }

    public function samplePapers($subjectId) {
        $isHome = false;
        $classes = ClassName::all();
        $papers = DataFile::where('class_subject_id',$subjectId)->where('data_type_id', DataFileType::where('type', 'Sample Papers')->value('id'))->get();
        $type = 'Sample Papers';
        return view('frontend.material',compact('type','papers','isHome','classes'));
    }

    public function prevYearPapers($subjectId) {
        $isHome = false;
        $classes = ClassName::all();
        $papers = DataFile::where('class_subject_id',$subjectId)->where('data_type_id', DataFileType::where('type', 'Previous Year Papers')->value('id'))->get();
        $type = 'Previous Year Papers';
        return view('frontend.material',compact('type','papers','isHome','classes'));
    }

    public function keyNotes($subjectId) {
        $isHome = false;
        $classes = ClassName::all();
        $papers = DataFile::where('class_subject_id',$subjectId)->where('data_type_id', DataFileType::where('type', 'Key Notes')->value('id'))->get();
        $type = 'Key Notes';
        return view('frontend.material',compact('type','papers','isHome','classes'));
    }

    public function refMaterial($subjectId) {
        $isHome = false;
        $classes = ClassName::all();
        $papers = DataFile::where('class_subject_id',$subjectId)->where('data_type_id', DataFileType::where('type', 'Reference Material')->value('id'))->get();
        $type = 'Reference Material';
        return view('frontend.material',compact('type','papers','isHome','classes'));
    }

    public static function confirm($message) {
        $isHome=false;
        $classes = ClassName::all();
        $classSubjects = ClassSubject::where('id','>','0');
        $wbContents = WebsiteContent::all();

        if( sizeof($wbContents) > 0 ) {
            foreach ($wbContents as $key => $value) {
                $content[$value->title] = $value->content;
            }
        }
        return view('frontend.confirmPage',compact('message','classes','isHome','classSubjects','content'));
    }

    public function getFeedback() {
        $isHome=false;
        $classes = ClassName::all();
        $classSubjects = ClassSubject::where('id','>','0');
        $wbContents = WebsiteContent::all();

        if( sizeof($wbContents) > 0 ) {
            foreach ($wbContents as $key => $value) {
                $content[$value->title] = $value->content;
            }
        }

        $grades = FeedbackGrade::all();
        return view('frontend.feedback',compact('grades', 'classes','isHome','classSubjects','content'));        
    }

    public function storeFeedback() {
        $feedback = new Feedback;
        $feedback->user_id = Auth::user()->id;
        $feedback->response = Input::get('response');
        $feedback->material = Input::get('material');
        $feedback->query_resolve = Input::get('query_resolve');
        $feedback->message = Input::get('message');
        $feedback->save();

        $message = "Thankyou For Your Feedback!! :)";
        return $this->confirm($message);        
    }

    public function viewFeedbacks() {
        $isHome=false;
        $classes = ClassName::all();
        $classSubjects = ClassSubject::where('id','>','0');
        $wbContents = WebsiteContent::all();

        if( sizeof($wbContents) > 0 ) {
            foreach ($wbContents as $key => $value) {
                $content[$value->title] = $value->content;
            }
        }

        $feedbacks = Feedback::where('at_front','1')->get();
        return view('frontend.view_feedback',compact('feedbacks','classes','isHome','classSubjects','content'));
    }

    public function storeExamTimeHelp(Request $request)
    {
        $help = new ExamHelp;
        $help->user_id = Auth::user()->getMember->id;
        $help->save();
        $num = Input::get('rownum');
        for ($i=0; $i < $num; $i++) { 
            $sub = new ExamHelpSubject;
            $sub->help_id = $help->id;
            $sub->subject_id = '0';
            $sub->other_subject = Input::get('msubject'.$i);
            $sub->topic = Input::get('mtopic'.$i);
            $sub->save();
        }

        return redirect()->route('emailExamHelp', array('help' => $help->id));

        $message = "Thankyou! Will get back to you soon";
        return $this->confirm($message);
    }

    public function changePassword(Request $request, $type)
    {
        if (Input::get('pass') === Input::get('re_pass')) {
            // return 'equal';
            $id = Auth::user()->id;
            User::where('id',$id)->where('type_id', UserType::where('type',$type)->value('id'))->update(['password' => bcrypt(Input::get('pass'))]);
        }
        $message = "Password Updated!";
        return $this->confirm($message);
    }
}
