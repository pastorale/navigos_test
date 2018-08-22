<?php
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model as Eloquent;

class User extends Eloquent
{
    private $id;

    /** @var string */
    private $name;

    /** @var string */
    private $email;

    /** @var integer */
    private $role;

    public function message() {
        return $this->hasMany('Message');
    }

}
