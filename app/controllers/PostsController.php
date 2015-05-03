<?php

use Phalcon\Mvc\Controller;

class PostsController extends Controller
{
    public $settings;

    public function onConstruct()
    {
        //...
    }

    public function initialize()
    {
        $this->settings = array(
            "mySetting" => "value"
        );
    }


    public function indexAction()
    {

    }

    public function showAction()
    {
        $this->flash->error("You don't have permission to access this area");

        // Forward flow to another action
        $this->dispatcher->forward(array(
            "controller" => "users",
            "action"     => "signin"
        ));
    }

    public function saveAction()
    {
        // Check if request has made with POST
        if ($this->request->isPost() == true) {
            // Access POST data
            $customerName = $this->request->getPost("name");
            $customerBorn = $this->request->getPost("born");


            echo "Hello: $customerName | $customerBorn";
        }


        $this->view->disable();
    }

}