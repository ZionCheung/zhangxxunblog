<?php

namespace app\index\controller;

use app\index\controller\Currency as indexCurr;


class Study extends indexCurr
{
    public function study()
    {
        return $this->fetch('home/study');
    }
}