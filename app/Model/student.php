<?php

namespace App\Model;
use Illuminate\Database\Eloquent\Model;
use DB;

class student extends Model {

  protected $table = 'student'; // กำหนดชื่อของตารางที่ต้องการเรียกใช้
  public static $key = 'student_id';
}

?>
