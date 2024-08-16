<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Taggable extends Model
{
    use HasFactory;

    protected $fillable = [
        'tag_id',
        'card_id'
    ];

    // In the Post.php model:
    public function tags(): belongsTo
    {
        return $this->belongsTo(Tag::class);
    }

    // In the Tag.php model:
    public function cards(): belongsTo
    {
        return $this->belongsTo(Card::class);
    }

}
