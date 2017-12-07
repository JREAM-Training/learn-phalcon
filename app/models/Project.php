<?php

class Project extends BaseModel
{
    public function initialize()
    {

        $this->belongsTo('user_id', 'User', 'id');
    }
}