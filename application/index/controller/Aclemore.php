<?php

namespace app\index\controller;

use think\Controller;


class AcleMore extends Controller
{
    public function acleMore () {
        return $this -> fetch('home/aclemore');
    }
}