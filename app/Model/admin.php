<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class admin extends Model
{
    protected $fillable = ['username', 'password'];
}

class project extends Model {

  protected $table = 'project'; // กำหนดชื่อของตารางที่ต้องการเรียกใช้

}
