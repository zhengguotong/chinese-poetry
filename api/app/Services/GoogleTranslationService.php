<?php

namespace App\Services;

use App\Services\Contracts\ITranslation;
use Google\Cloud\Translate\V2\TranslateClient;
use Config;
use Exception;

class GoogleTranslationService implements ITranslation
{
    protected $client;

    public function __construct()
    {
        $this->client =  new TranslateClient([
            'key' => Config::get('chinesepoetry.google_api_key')
        ]);
    }

    public function translate($text, $target = 'zh-CN') : string
    {
        $result = $this->client->translate($text, [
            'target' => $target
        ]);
            
        if ($result) {
            return $result['text'] ?? $text;
        }
        
        return $text;
    }
}
