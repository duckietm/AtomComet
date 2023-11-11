<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class WebsiteArticleReaction extends Model
{
    use HasFactory;

    protected $guarded = [];

    public $timestamps = false;

    protected $hidden = [
        'user_id',
        'article_id',
    ];

    public static function getReaction(int $articleId, int $userId, string $reaction): ?self
    {
        return self::where('user_id', $userId)
            ->where('article_id', $articleId)
            ->where('reaction', $reaction)
            ->first();
    }

    public static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->user_id = auth()->id();
        });
    }

    public function article(): BelongsTo
    {
        return $this->belongsTo(WebsiteArticle::class, 'article_id');
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
