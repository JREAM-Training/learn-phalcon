<?php

use \Phalcon\Tag;

class BaseController extends \Phalcon\Mvc\Controller
{
    public function initialize()
    {
        Phalcon\Tag::prependTitle('ALF' . ' | ');

        $this->assets
            ->collection('style')
            ->addCss('http://fonts.googleapis.com/css?family=Ubuntu:300', false, true)
            ->addCss('third-party/css/bootstrap.min.css', false, false)
            ->addCss('css/style.css')
            ->setTargetPath('css/production.css')
            ->setTargetUri('css/production.css')
            ->join(true)
            ->addFilter(new \Phalcon\Assets\Filters\Cssmin());

        $this->assets
            ->collection('js')
            ->addJs('third-party/js/jquery.min.js', false, false)
            ->addJs('third-party/js/bootstrap.min.js', false, false)
            ->setTargetPath('js/production.js')
            ->setTargetUri('js/production.js')
            ->join(true)
            ->addFilter(new \Phalcon\Assets\Filters\Jsmin());
    }

}