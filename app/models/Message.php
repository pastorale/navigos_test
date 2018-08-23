<?php

use Illuminate\Database\Eloquent\Model as Eloquent;

class Message extends Eloquent
{
    protected $fillable= [
        'title',
        'content',
        'created_at'
    ];

    public function user() {
        return $this->belongsTo('User');
    }
}