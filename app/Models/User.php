<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
  use HasFactory;
  public function scopeEmployees($query)
  {
    $query->where('role', 'employee');
  }
  public function scopeAuthor($query)
  {
    $query->where('role', 'author');
  }
  public function empByDepartment()
  {
    return $this->hasMany(User::class, 'department', 'department');
  }
  public function ws()
  {
    return $this->hasOne(EmployeeStatus::class, 'id', 'working_status');
  }
}
