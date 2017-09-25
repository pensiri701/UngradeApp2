<?php

namespace App\Model;
use Illuminate\Database\Eloquent\Model;
use DB;

class programme extends Model {

  protected $table = 'programme';    // กำหนดชื่อของตารางที่ต้องการเรียกใช้
  public static $key = 'program_id';
}

?>
