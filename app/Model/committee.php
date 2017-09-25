<?php

namespace App\Model;
use Illuminate\Database\Eloquent\Model;
use DB;

class committee extends Model {

  protected $table = 'committee'; // กำหนดชื่อของตารางที่ต้องการเรียกใช้
  public static $key = 'cid';

  public function staff(){
    return $this->belongTo('App\staff','staff_id');
  }

  public function project(){
    return $this->belongTo('App\project','pid');
  }

}

?>
