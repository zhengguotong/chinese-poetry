<?php

namespace App\Services\Contracts;

interface ITranslation
{
    public function translate($text, $target = 'zh-CN') : string;
}
