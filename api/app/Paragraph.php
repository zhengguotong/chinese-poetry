<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paragraph extends Model
{
    use HasFactory;

    protected $fillable = [
        'poetry_id',
        'sequence',
        'paragraph',
    ];

    /**
     * Get the post that owns the comment.
     */
    public function poetry()
    {
        return $this->belongsTo('App\Models\Poetry', 'id', 'poetry_id');
    }
}
