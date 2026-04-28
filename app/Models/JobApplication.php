<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JobApplication extends Model
{
    protected $fillable = ['career_id', 'first_name', 'last_name', 'email', 'phone', 'message', 'status', 'is_active'];

    public function career()
    {
        return $this->belongsTo(Career::class);
    }
}
