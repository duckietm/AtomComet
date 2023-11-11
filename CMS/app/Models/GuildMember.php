<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class GuildMember extends Model
{
    protected $table = 'guilds_members';

    protected $guarded = ['id'];

    public $timestamps = false;

    public function guilds(): HasMany
    {
        return $this->hasMany(Guild::class);
    }
}
