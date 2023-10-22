<?php

namespace app\model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use support\Model;

class Question extends Model
{
    use HasFactory;

    protected $fillable = ['content', 'user_id', 'event_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function event()
    {
        return $this->belongsTo(Event::class);
    }
}