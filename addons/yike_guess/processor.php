<?php

defined('IN_IA') or exit('Access Denied');
class Yike_guessModuleProcessor extends WeModuleProcessor
{
    public function respond()
    {
        $content = $this->message['content'];
    }
}