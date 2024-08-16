<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Card extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'url',
        'user_id',
    ];

    // Indica que um card perternce a um usuário
    public function user(): BelongsTo
    {
        return $this->BelongsTo(User::class);
    }
    // In the Post.php model:
    public function tags(): belongsToMany
    {
        return $this->belongsToMany(Tag::class);
    }

}
