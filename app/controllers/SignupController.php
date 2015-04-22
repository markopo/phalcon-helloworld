<?php

use Phalcon\Mvc\Controller;
use Phalcon\Mvc\Model\Query;

class SignupController extends Controller
{

    public function indexAction()
    {

    }

    public function registerAction()
    {
        $user = new Users();

        //Store and check for errors
        $success = $user->save($this->request->getPost(), array('name', 'email'));

        if ($success) {

            $_POST = array();

            $query = new Query("SELECT * FROM users", $this->getDI());
            $regUsers = $query->execute();

            echo "<ol>";
            foreach($regUsers as $u){
                echo "<li>" . $u->name . " " . $u->email . "</li>";
            }
            echo "</ol>";

            echo "Thanks for registering!";



        } else {
            echo "Sorry, the following problems were generated: ";
            foreach ($user->getMessages() as $message) {
                echo $message->getMessage(), "<br/>";
            }
        }

        $this->view->disable();
    }



}