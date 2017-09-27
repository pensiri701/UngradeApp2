<?php

namespace App\Model;
use Illuminate\Database\Eloquent\Model;
use DB;

class committee extends Model {

  protected $table = 'committee'; // กำหนดชื่อของตารางที่ต้องการเรียกใช้
  protected $primaryKey = 'cid';

  public function staff(){
    return $this->belongsTo('App\Model\staff','staff_id');
  }

  public function staffs (){
    return $this->belongsTo('App\Model\staff','staff_id');
  }

  public function project(){
    return $this->belongTo('App\project','pid');
  }

}

?>
