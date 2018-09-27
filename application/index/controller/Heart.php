<?php

namespace app\index\controller;

use app\index\controller\Currency as indexCurr;


class Heart extends indexCurr
{
    public function heart()
    {
        return $this->fetch('home/heart');
    }
}