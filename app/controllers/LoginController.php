<?php

use Phalcon\Tag;

class LoginController extends BaseController
{

    public function indexAction()
    {
        Tag::setTitle('Christian Audio');
        $this->assets->collection('extra')
            ->addCss('css/signin.css');

        parent::initialize();

    }


}