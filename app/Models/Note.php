<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    use HasFactory;
 protected $fillable = [
        'title',
        'body',
        'description',

    ];
     public function company()
    {
        return $this->belongsTo(company::class);
    }
     public function users()
    {
        return $this->belongsToMany(Note::class, 'notes_users', 'users_id', 'notes_id');
    }
      public function employees()
    {
        return $this->belongsToMany(employee::class, 'notes_employees', 'notes_id', 'employees_id');
    }
}