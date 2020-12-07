<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Poetry extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'author',
        'type',
    ];


    public function paragraphs()
    {
        return $this->hasMany('App\Models\Paragraph', 'poetry_id', 'id');
    }
}
