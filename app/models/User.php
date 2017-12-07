<?php

use \Phalcon\Mvc\Model\Behavior\SoftDelete;

class User extends BaseModel
{

    public function initialize()
    {
        // local field, referenced model, referenced field.
        $this->hasMany('id', 'Project', 'user_id');

        $this->addBehavior(new SoftDelete([
            'field' => 'deleted',
            'value' => 1
        ]));
    }

}