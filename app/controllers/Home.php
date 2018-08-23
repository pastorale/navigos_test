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
        /** @var Message $message */
        $message = $this->model('message');
        $data = $message::orderBy('updated_at', 'desc')->get();
        $this->view('home', [
            'data' => $data
        ]);
    }
}
