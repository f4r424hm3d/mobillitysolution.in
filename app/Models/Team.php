<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
  use HasFactory;
  public function empByDepartment()
  {
    return $this->hasMany(User::class, 'department', 'department');
  }
  public function ws()
  {
    return $this->hasOne(EmployeeStatus::class, 'id', 'working_status');
  }
}
