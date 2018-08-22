<?php
class AddMessage extends Controller
{
    /**
     * The default controller method.
     *
     * @return void
     */
    public function index() {
        var_dump('aaa');die;
        $this->view('add_message',[]);
    }
}