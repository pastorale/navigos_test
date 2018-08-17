<?php

class Home extends Controller
{
    /**
     * The default controller method.
     *
     * @return void
     */
    public function index()
    {
        $user = $this->model('user');

        $this->view('home/index', [
            'name' => $user->name,
        ]);
    }
}
