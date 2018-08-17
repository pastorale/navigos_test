<?php

use Illuminate\Database\Eloquent\Model as Eloquent;

class Message extends Eloquent
{
    private $id;

    /** @var string */
    private $title;

    /** @var string */
    private $content;

    /** @var datetime */
    private $created_at ;

    /** @var datetime */
    private $update_at;

    public function user() {
        return $this->belongsTo('user');
    }

}