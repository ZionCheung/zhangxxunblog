<?php

namespace app\index\controller;

use app\index\controller\Currency as indexCurr;


class NoisyLife extends indexCurr
{
    public function noisyLife()
    {
        return $this->fetch('home/noisylife');
    }
}