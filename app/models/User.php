<?php
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model as Eloquent;

class User extends Eloquent
{
    protected $fillable= [
        'name',
        'email',
        'role'
    ];

    public function message() {
        return $this->hasMany('Message');
    }

}
