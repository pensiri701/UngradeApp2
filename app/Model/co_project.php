<?php

namespace App\Model;
use Illuminate\Database\Eloquent\Model;
use DB;

class co_project extends Model {

  protected $table = 'co_project'; // กำหนดชื่อของตารางที่ต้องการเรียกใช้
  public static $key = 'coid';


  public  function student(){
    return $this->belongTo('App\student','student_id' );
  }

  public  function project(){
    return $this->belongTo('App\project','pid');
  }




}

?>
