<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Completion extends Model
{
    protected $guarded = ['id'];

    protected $casts = [
        'user_id' => 'int',
        'completable_id' => 'int',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function completable()
    {
        return $this->morphTo();
    }

    public function scopeModules($query)
    {
        return $query->where('completable_type', (new Module)->getMorphClass());
    }

    public function scopeResources($query)
    {
        return $query->where('completable_type', (new Resource)->getMorphClass());
    }

    public function scopeSkills($query)
    {
        return $query->where('completable_type', (new Skill)->getMorphClass());
    }
}
