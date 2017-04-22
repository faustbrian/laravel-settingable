<?php



declare(strict_types=1);



namespace BrianFaust\Settingable;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Setting extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['key', 'value', 'collection'];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = ['value' => 'collection'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\MorphTo
     */
    public function settingable(): MorphTo
    {
        return $this->morphTo();
    }

    /**
     * @return \Illuminate\Support\Collection|mixed
     */
    public function getValueAttribute()
    {
        $value = collect(json_decode($this->attributes['value']));

        return ($value->count() > 1) ? $value : $value->first();
    }
}
