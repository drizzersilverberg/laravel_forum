<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reply extends Model
{
    use Favoritable, RecordsActivity;

	protected $guarded = [];

    protected $with = ['owner', 'favorites'];

    /*
        Once the attribute has been added to the appends list, it will be included in both the model's array and JSON representations.

        Source: https://laravel.com/docs/5.4/eloquent-serialization#appending-values-to-json
    */
    protected $appends = ['favoritesCount', 'isFavorited'];

    public function owner()
    {
    	return $this->belongsTo(User::class, 'user_id');
    }

    public function thread()
    {
        return $this->belongsTo(Thread::class);
    }

    public function path()
    {
        return $this->thread->path() . "#reply-{$this->id}";
    }
}
