<?php

use Phalcon\Tag;

class IndexController extends BaseController
{

    public function indexAction()
    {
    }

    public function startSessionAction()
    {
        $this->session->set('user', [
            'name' => 'Ted',
            'age' => 55,
            'soOn' => 'soForth'
        ]);
        $this->session->set('name', 'Jesse');
    }

    public function getSessionAction()
    {
        $user = $this->session->get('user');
        print_r($user);
        echo $this->session->get('name');
    }

    public function removeSessionAction()
    {
        echo $this->session->remove('name');
    }

    public function destroySessionAction()
    {
        echo $this->session->destroy();
    }

}