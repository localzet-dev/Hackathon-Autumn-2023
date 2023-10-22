<?php

namespace app\model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use support\Model;

class Event extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'description', 'date', 'specialist_id'];

    public function specialist()
    {
        return $this->belongsTo(Specialist::class);
    }

    public function questions()
    {
        return $this->hasMany(Question::class);
    }
}