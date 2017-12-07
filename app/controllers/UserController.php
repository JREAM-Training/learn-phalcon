<?php

use Phalcon\Tag;

class UserController extends BaseController
{
    public function indexAction()
    {
        $this->view->setVars([
            'single' => User::findFirstById(1),
            'all' => User::find([
                'deleted is NULL'
            ])
        ]);
    }

    public function createAction()
    {
        $user = new User();
        $user->email = "test@test.com";
        $user->password = "test";
        $result = $user->create();
        if (!$result) {
            print_r($user->getMessages());
        }
    }

    public function createAssocAction()
    {
        $user = User::findFirst(1);
        $project = new Project();
        $project->user = $user;
        $project->title = "Moonwalker";
        $result = $project->save();
    }

    public function updateAction()
    {
        $user = User::findFirstById(21);
        if (!$user) {
            echo "User does not exist";
            die;
        }

        $user->email = "updated@test.com";
        $result = $user->update();
        if (!$result) {
            print_r($user->getMessages());
        }
    }

    public function deleteAction()
    {
        $user = User::findFirstById(11);
        if (!$user) {
            echo "User does not exist";
            die;
        }
        $result = $user->delete();
        if (!$result) {
            print_r($user->getMessages());
        }
    }

}