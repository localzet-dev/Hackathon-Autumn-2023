<?php

namespace app\model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use support\Model;

class Poll extends Model
{
    protected $fillable = ['question', 'options', 'event_id'];

    public function event()
    {
        return $this->belongsTo(Event::class);
    }
}