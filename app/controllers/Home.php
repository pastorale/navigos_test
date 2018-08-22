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
        /** @var User $user */
        $user = $this->model('user');
        $data = $user::all();
        $this->view('home', [
            'name' => $user->name,
        ]);
    }
}
