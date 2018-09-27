<?php

namespace app\index\controller;

use think\Controller;


class AboutMe extends Controller
{
    public function aboutMe () {
        return $this -> fetch('home/aboutme');
    }   
}