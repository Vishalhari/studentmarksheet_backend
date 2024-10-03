<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Studentmarks extends Model
{
    use HasFactory;



    function subjects() {
        return $this->belongsTo(Subjects::class, 'subjectid', 'id');
    }
}
