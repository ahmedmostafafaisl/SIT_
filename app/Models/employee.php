<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class employee extends Model
{
    use HasFactory;
protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'phone',
        'company_id',
    ];
     public function company()
    {
        return $this->belongsTo(company::class);
    }
      public function notes()
    {
        return $this->belongsToMany(Note::class, 'notes_users', 'employees_id', 'notes_id');
    }
}