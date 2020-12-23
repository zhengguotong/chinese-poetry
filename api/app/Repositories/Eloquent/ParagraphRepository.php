<?php

namespace App\Repositories\Eloquent;

use App\Paragraph;
use App\Repositories\Contracts\IParagraph;

class ParagraphRepository extends BaseRepository implements IParagraph
{
    public function model()
    {
        return Paragraph::class;
    }
}
