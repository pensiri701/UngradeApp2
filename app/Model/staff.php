<?php

namespace App\Model;
use Illuminate\Database\Eloquent\Model;
use DB;


//Class staff extends Eloquent implements UserInterface,RemindableInterface{
Class staff extends Model{

  protected $table = 'staff'; // กำหนดชื่อของตารางที่ต้องการเรียกใช้
  protected $primaryKey = 'staff_id';

  public function committee(){
    return $this->hasMany('App\committee','staff_id');
  }

}

?>
