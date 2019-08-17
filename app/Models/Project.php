<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    public function Skill()
    {
        return $this->belongsTo(Skill::class);
    }
}
