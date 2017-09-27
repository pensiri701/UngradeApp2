<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\project;
use App\Model\student;
use App\Model\co_project;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
use Input;

// FIXME Rename this to ProjectController
class projectController extends Controller
{
  public function index()
  {
    $projects = Project::all();
    return $projects;
  }

  /**
   * $projectId integer project id
   **/
  public function view($projectId)
  {
    $project = Project::findOrFail($projectId);
    return $project;
  }
  /* committee */
  public function indexCommittee()
  {
    $output=project::getAll();
    return view('committee.indexC',compact('output'));
  }


  public function projectAdvisor()
  {
    $thisyear=date('Y')+543;
    $items=project::projectAdvisor(session('userID'),$thisyear);

    $output=[];
    if (! $items->isEmpty()) {
    foreach ($items as $item) {
       $output[$item->pid]['project']['pid'] = $item->pid;
       $output[$item->pid]['project']['projectTitleTH'] = $item->titleTH;
       $output[$item->pid]['project']['projectTitleEN'] = $item->titleEN;
       $output[$item->pid]['project']['course'] = $item->course;
       $output[$item->pid]['project']['semester'] = $item->reg_semester;
       $output[$item->pid]['project']['regisyear'] = $item->reg_year;
       $output[$item->pid]['project']['sec'] = $item->sec;
       $output[$item->pid]['students'][$item->student_id]['student']['student_id'] = $item->student_id;
       $output[$item->pid]['students'][$item->student_id]['student']['student_name'] = $item->sfNameTH;
       $output[$item->pid]['committee'][$item->staff_id]['committee']['staffName'] = $item->sNameEN;
       $output[$item->pid]['committee'][$item->staff_id]['committee']['type'] = $item->type;
       $output[$item->pid]['committee'][$item->staff_id]['committee']['statusApprov'] = $item->statusApprov;
    }

  }

      return view('committee.projectAdvisor',compact('output'));

  }

  public function projectCommittee()
  {
    $thisyear=date('Y')+543;
    $items=project::projectCommittee(session('userID'),$thisyear);

    $output=[];
  if (! $items->isEmpty()) {
    foreach ($items as $item) {
       $output[$item->pid]['project']['pid'] = $item->pid;
       $output[$item->pid]['project']['projectTitleTH'] = $item->titleTH;
       $output[$item->pid]['project']['projectTitleEN'] = $item->titleEN;
       $output[$item->pid]['project']['course'] = $item->course;
       $output[$item->pid]['project']['semester'] = $item->reg_semester;
       $output[$item->pid]['project']['regisyear'] = $item->reg_year;
       $output[$item->pid]['project']['sec'] = $item->sec;
       $output[$item->pid]['students'][$item->student_id]['student']['student_id'] = $item->student_id;
       $output[$item->pid]['students'][$item->student_id]['student']['student_name'] = $item->sfNameTH;
       $output[$item->pid]['committee'][$item->staff_id]['committee']['staffName'] = $item->sNameEN;
       $output[$item->pid]['committee'][$item->staff_id]['committee']['type'] = $item->type;
       $output[$item->pid]['committee'][$item->staff_id]['committee']['statusApprov'] = $item->statusApprov;
    }

  }
    return view('committee.projectCommittee',compact('output'));
  }

  public function committeeEditProjecteDetail(Request $pid)
  {
    $output= project::selectProject($pid);
    return view('committee.editProject',compact('output'));

  }

public function committeeUpdateProject()
{

      $titleEN = Input::get('titleEN');
			$titleTH = Input::get('titleTH');
      $pid = Input::get('pid');


		   $data = array(
				 'titleTH'  => $titleEN,
				 'titleEN'  => $titleTH,
				);

       $results =  project::commUpdateProject($pid,$data);

        return redirect('/committee/'.$pid);


}
/* ---------------- Login ------------------------ */
public function StudentAuthen()
{
  $pid = Input::get('studentID');
  $name = Input::get('fullname');
  $output= project::StudentAuthenDB($pid,$name);


  if($output==null){
    //or goto regis page
     return redirect('/login');
  }else{

      session()->flush();
      session(['userID' => $pid]);
      session(['userName' => $name]);
      //echo session('userID');
       return redirect('/student');
  }
}

public function StaffAuthen()
{

  $pid = Input::get('staffID');
  $name = Input::get('fullname');

  $output= project::StaffAuthenDB($pid,$name);

  if($output==null){
    //or goto regis page
     return redirect('/stafflogin');
  }else{

      session()->flush();
      session(['userID' => $pid]);
      session(['userName' => $name]);
      //echo session('userID');
       return redirect('/committee/projectAdvisor');
  }
}
/* ------------------------------------------------- */


  public function committeeApprove($pid,$status)
  {
    $output= project::committeeApprove($pid,$status);
     return redirect('/committee/projectAdvisor');
  }

  public function committeeProjectDetail(Request $pid)
  {
    $output= project::selectProject($pid);
    return view('committee.projectDetail',compact('output'));

  }


  public function stdActionProject($act,$pid)
  {
    $output= project::stdActionProject($act,$pid);
    return view('student.myProject',compact('output'));

  }
public function stdViewEditProject($pid)
	{
		$output= project::selectProject($pid);
		return view('student.stdEditProject',compact('output'));
	}

public function stdProjectDetail(Request $pid)
{
  $output= project::selectProject($pid);
  return view('student.projectDetail',compact('output'));

}
  public function projectDetail(Request $pid)
  {
    $output= project::selectProject($pid);
    return view('viewProject',compact('output'));

  }

  public function addProject491(){
      return view('student.addProject491');
  }
  public function addProject492(){
      return view('student.addProject492');
  }

  /* get my project */
  public function studentAllProject()
  {
    $projects = project::getAll();
    // print_r($output);exit();
    return view('student.allProject', compact('projects'));
  }

  public function myStudentProject()
  {

    $items=project::myStudentProject(session('userID'));

     $output=[];
   if (! $items->isEmpty()) {
     foreach ($items as $item) {
        $output[$item->pid]['project']['pid'] = $item->pid;
        $output[$item->pid]['project']['projectTitleTH'] = $item->titleTH;
        $output[$item->pid]['project']['projectTitleEN'] = $item->titleEN;
        $output[$item->pid]['project']['course'] = $item->course;
        $output[$item->pid]['project']['semester'] = $item->reg_semester;
        $output[$item->pid]['project']['regisyear'] = $item->reg_year;
        $output[$item->pid]['project']['sec'] = $item->sec;
        $output[$item->pid]['students'][$item->student_id]['student']['student_id'] = $item->student_id;
        $output[$item->pid]['students'][$item->student_id]['student']['student_name'] = $item->sfNameTH;
        $output[$item->pid]['committee'][$item->staff_id]['committee']['staffName'] = $item->sNameEN;
        $output[$item->pid]['committee'][$item->staff_id]['committee']['type'] = $item->type;
        $output[$item->pid]['committee'][$item->staff_id]['committee']['statusApprov'] = $item->statusApprov;

     }
   }
    return view('student.myProject',compact('output'));

  }

  public function AllProject()
  {
    $output=project::getAll();
    return view('allProject',compact('output'));

  }
  public function AdminselectAllProject()
  {
    $output=project::getAll();
    return view('allProject',compact('output'));

  }

  public function selectProjectID(Request $id)
  {

    $data  = DB::table('project')
    ->join('co_project', 'project.pid', '=', 'co_project.pid')
    ->join('student', 'student.student_id', '=', 'co_project.student_id')
    ->join('committee', 'committee.pid', '=', 'project.pid')
    ->join('staff', 'staff.staff_id', '=', 'committee.staff_id')
    ->where('co_project.student_id','!=','')
    ->where('project.pid','=','$id')
    ->orderby('project.pid', 'ASC')
    ->get();

   	return view('viewProject',$data );
  }

  public function selectMyProject(Request $id)
  {

    $data  = DB::table('project')
    ->join('co_project', 'project.pid', '=', 'co_project.pid')
    ->join('student', 'student.student_id', '=', 'co_project.student_id')
    ->join('committee', 'committee.pid', '=', 'project.pid')
    ->join('staff', 'staff.staff_id', '=', 'committee.staff_id')
    ->where('co_project.student_id','!=','')
    ->where('project.pid','=','$id')
    ->orderby('project.pid', 'ASC')
    ->get();

   	return view('viewProject',$data );
  }

  public function ProjectSubmit()
  {

            $subject= Input::get('subject');
          	$titleTH = Input::get('titleTH');
          	$titleEN = Input::get('titleEN');
          	$advisor= Input::get('advisor');
            $student= Input::get('std');
            $section= Input::get('sec');

            $semester= Input::get('semester');
            $year= Input::get('year');

/*
            $source= Input::file('source');
            $pdf= Input::file('pdf');
            $link= Input::get('link');


        $pathPdf = realpath(public_path('/datafile/pdf'));
        $pathSource = realpath(public_path('/datafile/source'));

        if($source=="")
        $extensionPdf = Input::file('pdf')->getClientOriginalExtension(); // getting  extension
        $extensionSource= Input::file('source')->getClientOriginalExtension(); // getting  extension

        $fileNamePdf = rand(11111,99999).'.'.$extensionPdf ; // renameing
        $fileNameSource = rand(11111,99999).'.'.$extensionSource ; // renameing

        $movepdf =  Input::file('pdf')->move($pathPdf, $fileNamePdf); // uploading file to given path
        $moveSource =  Input::file('source')->move($pathSource, $fileNameSource); // uploading file to given path

      //echo $fileNamePdf."<br>";
      //  echo $fileNameSource."<br>";
*/


        $dataProject = array(
        'course'=> $subject,
        'titleTH'=> $titleTH,
        'titleEN'=>$titleEN,
        'sec'=>$section,
        'reg_semester'=> $semester,
        'reg_year'=>$year

         );

       $dataCommittee = array(
        'advisor'=> $advisor
        );
/*
       $dataProjectFile = array(
       'file'=> $source,
       'pdf'=> $pdf ,
       'link'=> $source
       );
*/

//    1.insert project
         $results1=project::addProject($dataProject);

//      2.insert co_project
        foreach ($student as $key => $value) {
          if($value!=""){
           $dataCoProject = array(
            'pid'=>$results1,
            'student_id'=> $value
           );
          $results2=project::addCoProject($dataCoProject);
          }
        }

//      3. insert committee
         $results3=project::addCommittee($results1,$dataCommittee);
        // echo $results3;

//      4. inser file
    //  $results4 =  project::addProjectFile($dataProjectFile);
		//return redirect("EditRunner/$results");
        return redirect("/student/myProject");
  }

}
