<?php

namespace App\Model;
use Illuminate\Database\Eloquent\Model;
use DB;

class ex_committee extends Model {

  protected $table = 'ex_committee';    // กำหนดชื่อของตารางที่ต้องการเรียกใช้
  public static $key = 'exid';
}

?>
