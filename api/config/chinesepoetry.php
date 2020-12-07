<?php

return [
    'google_api_key'  => env('GOOGLE_API_KEY'),
    'authors_source' => [
        'tang' => 'https://raw.githubusercontent.com/chinese-poetry/chinese-poetry/master/json/authors.tang.json',
        'song' => 'https://raw.githubusercontent.com/chinese-poetry/chinese-poetry/master/json/authors.song.json',
    ],
    'poetry_source' => [
        'shi' => [
            'tang' => 'https://raw.githubusercontent.com/chinese-poetry/chinese-poetry/master/json/poet.tang.',
            'song' => 'https://raw.githubusercontent.com/chinese-poetry/chinese-poetry/master/json/poet.song.'
        ]
    ] 
];
