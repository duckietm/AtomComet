<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;

class WebsiteArticle extends Model
{
    use SoftDeletes;

    protected $guarded = ['id'];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function reactions(): HasMany
    {
        return $this->hasMany(WebsiteArticleReaction::class, 'article_id')
            ->whereActive(true);
    }

    public function comments(): HasMany
    {
        return $this->hasMany(WebsiteArticleComment::class, 'article_id');
    }

    public function userHasReachedArticleCommentLimit(): bool
    {
        return $this->comments()->where('user_id', '=', Auth::id())->count() >= (int) setting('max_comment_per_article');
    }
}
