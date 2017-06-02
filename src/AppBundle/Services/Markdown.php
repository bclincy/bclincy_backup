<?php

namespace AppBundle\Services;


class Markdown {

    public function parse($str)
    {
        return strtoupper($str);
    }
}