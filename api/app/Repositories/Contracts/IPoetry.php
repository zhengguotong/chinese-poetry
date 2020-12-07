<?php 

namespace App\Repositories\Contracts;

Interface IPoetry
{
    public function addParagraph($poetry_id, array $data);
}