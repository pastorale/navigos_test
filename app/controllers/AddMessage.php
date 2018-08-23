<?php
use Illuminate\Support\Facades\DB;
class AddMessage extends Controller
{
    /**
     * The default controller method.
     *
     * @return void
     */
    public function index() {
        if(isset($_POST['message'])) {
            /** @var User $user */
            $userModel = $this->model('user');
            $user = $userModel::where('email', $_POST['email'])->first();
            $message = new Message();
            if($user) {
                $message->user()->associate($user);
            } else {
                $user = new User();
                $user->name = $_POST['name'];
                $user->email = $_POST['email'];
                $user->role = 0;
                $user->save();
            }
            $message->user()->associate($user);
            $message->title = $_POST['title'];
            $message->content = $_POST['message'];
            $message->save();
            return;
        }
        $this->view('add_message',[]);
    }

    public function saveMessage() {

    }
}