<?php

namespace app\model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use support\Model;

class EventInfo extends Model
{
    protected $table = 'events_info';
    public $timestamps = false;

    protected $guarded = [];

    public function questions()
    {
        return $this->hasMany(Question::class);
    }
}