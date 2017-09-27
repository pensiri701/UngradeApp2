<?php

namespace App\Model;
use Illuminate\Database\Eloquent\Model;
use DB;


class project extends Model {

  protected $table = 'project'; // กำหนดชื่อของตารางที่ต้องการเรียกใช้
  protected $primaryKey = 'pid';
  // TODO check this, does someone use it?
  public static $key = 'pid';

// FIXME rename this to committees
public  function committee(){
  return $this->hasMany('App\committee','pid');
}

public function committees(){
  return $this->hasMany('App\Model\committee','pid');
}

public  function co_project(){
  return $this->hasMany('App\co_project','pid');
}

public static function StudentAuthenDB($id,$name){
  //x$namesearch = explode(".", $name);
  $data  = DB::table('student')
  ->where('student.student_id',"=",$id)
  ->first();

  return $data;
}

public static function StaffAuthenDB($id,$name){
  $data  = DB::table('staff')
  ->where('staff.staff_id',"=",$id)
  ->where('staff.username',"=",$name)
  ->first();

  return $data;

}


public static function getAll()
 {

   $data  = DB::table('project')
   ->join('co_project', 'project.pid', '=', 'co_project.pid')
   ->join('student', 'student.student_id', '=', 'co_project.student_id')
   ->join('committee', 'committee.pid', '=', 'project.pid')
   ->join('staff', 'staff.staff_id', '=', 'committee.staff_id')
   ->where('co_project.student_id',"!=","")
   ->orderby('project.pid', 'DESC' and 'project.course', 'ASC' and 'project.regisyear', 'DESC'  )
   ->get();
   $output=[];
   foreach ($data as $item) {
      $output[$item->pid]['project']['pid'] = $item->pid;
      $output[$item->pid]['project']['projectTitleTH'] = $item->titleTH;
      $output[$item->pid]['project']['projectTitleEN'] = $item->titleEN;
      $output[$item->pid]['project']['course'] = $item->course;
      $output[$item->pid]['project']['semester'] = $item->reg_semester;
      $output[$item->pid]['project']['regisyear'] = $item->reg_year;
      $output[$item->pid]['students'][$item->student_id]['student']['student_id'] = $item->student_id;
      $output[$item->pid]['students'][$item->student_id]['student']['student_name'] = $item->sfNameTH;
      $output[$item->pid]['committee'][$item->staff_id]['committee']['staffName'] = $item->sNameEN;
      $output[$item->pid]['committee'][$item->staff_id]['committee']['type'] = $item->type;
      $output[$item->pid]['committee'][$item->staff_id]['committee']['statusApprov'] = $item->statusApprov;

   }
    return $output;
 }

public static function selectProject($pid){

  $data= DB::table('project')
  ->leftjoin('co_project', 'project.pid', '=', 'co_project.pid')
  ->leftjoin('student', 'student.student_id', '=', 'co_project.student_id')
  ->leftjoin('committee', 'committee.pid', '=', 'project.pid')
  ->leftjoin('staff', 'staff.staff_id', '=', 'committee.staff_id')
  ->leftjoin('project_file','project_file.project_id','=','project.pid')
  ->where('project.pid',"=",$pid->id)
  ->where('co_project.student_id',"!=","")
   ->orderby('project.pid', 'ASC')
  ->distinct('project.pid')
  ->get();

  $output=[];
  foreach ($data as $item) {

     $output[$item->pid]['project']['pid'] = $item->pid;
     $output[$item->pid]['project']['projectTitleTH'] = $item->titleTH;
     $output[$item->pid]['project']['projectTitleEN'] = $item->titleEN;
     $output[$item->pid]['project']['course'] = $item->course;
     $output[$item->pid]['project']['semester'] = $item->reg_semester;
     $output[$item->pid]['project']['year'] = $item->reg_year;
     $output[$item->pid]['project']['pdf'] = $item->pdf;
     $output[$item->pid]['project']['file'] = $item->file;
     $output[$item->pid]['project']['link'] = $item->link;
     $output[$item->pid]['project']['sec'] = $item->sec;

     $output[$item->pid]['students'][$item->student_id]['student']['student_id'] = $item->student_id;
     $output[$item->pid]['students'][$item->student_id]['student']['student_name'] = $item->sfNameTH;

     $output[$item->pid]['committees'][$item->cid]['committee']['staffName'] = $item->sNameEN;
     $output[$item->pid]['committees'][$item->cid]['committee']['type'] = $item->type;
     $output[$item->pid]['committees'][$item->cid]['committee']['statusApprov'] = $item->statusApprov;
     $output[$item->pid]['committees'][$item->cid]['committee']['staff_id'] = $item->staff_id;

  }

      return $output;

 }

 	public static function myStudentProject($studentID)
  {

    $data  = DB::table('project')
    ->join('co_project', 'project.pid', '=', 'co_project.pid')
    ->join('student', 'student.student_id', '=', 'co_project.student_id')
    ->join('committee', 'committee.pid', '=', 'project.pid')
    ->join('staff', 'staff.staff_id', '=', 'committee.staff_id')
    ->where('co_project.student_id',"=",$studentID)
    ->orderby('project.pid', 'DESC' and 'project.course', 'ASC' and 'project.regisyear', 'DESC'  )
    ->get();


     return $data;
  }

 public static function commUpdateProject($pid,$data){
   $update = DB::table('project')
   		->where('pid', '=', $pid)
   		->update($data);
      return $update;

  }

 	public static function projectAdvisor($sid,$year)
  {

     $data  = DB::table('project')
    ->join('co_project', 'project.pid', '=', 'co_project.pid')
    ->join('student', 'student.student_id', '=', 'co_project.student_id')
    ->join('committee', 'committee.pid', '=', 'project.pid')
    ->join('staff', 'staff.staff_id', '=', 'committee.staff_id')
    ->where('project.reg_year','=',$year)
    ->where('co_project.student_id',"!=","")
    ->where('committee.staff_id','=',$sid)
    ->where('committee.type','=','advisor')
    ->orderby('project.pid', 'DESC' and 'project.course', 'ASC' and 'project.regisyear', 'DESC'  )
    ->get();


      return $data;

  }

  public static function projectCommittee($sid,$year)
 {
 //  echo "$sid,$year";
   $data  = DB::table('project')
   ->join('co_project', 'project.pid', '=', 'co_project.pid')
   ->join('student', 'student.student_id', '=', 'co_project.student_id')
   ->join('committee', 'committee.pid', '=', 'project.pid')
   ->join('staff', 'staff.staff_id', '=', 'committee.staff_id')
   ->where('project.reg_year','=',$year)
   ->where('co_project.student_id',"!=","")
   ->where('committee.staff_id','=',$sid)
   ->where('committee.type','=','committee')
   ->orderby('project.pid', 'DESC' and 'project.course', 'ASC' and 'project.regisyear', 'DESC'  )
   ->get();

    return $data;
 }

 public static function committeeApprove($id,$status)
{

  if($status==1){
    $update=DB::table('committee')
                ->where('pid', $id)
                ->update(['statusApprov' => 0]);

  }else {
    $update=DB::table('committee')
                ->where('pid', $id)
                ->update(['statusApprov' => 1]);

  }
    return $update;

}

 	public static function addProject($data)
 	{
 		return DB::table('project')
 		->insertGetId($data);
 	}

  public static function addCoProject($data)
  {
    return DB::table('co_project')
    ->insertGetId($data);
  }

  public static function addCommittee($maxid,$data)
  {

    $id = DB::table('committee')
      ->insertGetId(['pid' =>  $maxid, 'staff_id' => $data['advisor'],'type' => 'advisor' , 'grade' => '' ] );
    return $id;
  }
  public static function addProjectFile($data)
  {
    return DB::table('project_file')
    ->insertGetId($data);
  }

  public static function insertproject($dataProject,$dataCoProject,$dataCommittee,$dataProjectFile){
    //    1.insert project
     dd($dataProject['course']);
   }

 	public static function selectMax()
 	{

 		return DB::table('runner')
 		->select('runner.*', 'course.title AS title','course.distance', 'course.id AS cid','runner.birthdate AS age')
 		->join('course', 'runner.courseId', '=', 'course.id')
 		->orderby('runner.id', 'DESC')
 		->first();

 	}


}

?>
