<?php

namespace App\Repositories\Eloquent;

use App\Repositories\Contracts\IPoetry;

class PoetryRepository extends BaseRepository implements IPoetry
{
    public function model()
    {
        return PoetryRepository::class;
    }

    public function addParagraph($poetry_id, array $data)
    {
    }
}
