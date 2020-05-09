<?php

namespace App;


//use Cassandra\Cluster\Builder;
//use Cassandra\SSLOptions\Builder;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class Micropost extends Model
{
    protected $guarded = ['id'];

    /**
     * マイクロポストを新規作成順にソート
     */
    protected static function boot()
    {
        parent::boot();
        static::addGlobalScope('created_at', function (Builder $builder) {
            $builder->orderBy('created_at', 'desc');
        });
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
