<?php



declare(strict_types=1);



namespace BrianFaust\Settingable;

use Illuminate\Database\Eloquent\Relations\MorphMany;

trait Settingable
{
    /**
     * @return \Illuminate\Database\Eloquent\Relations\MorphMany
     */
    public function settingsCollection(): MorphMany
    {
        return $this->morphMany(Setting::class, 'settingable');
    }

    /**
     * @return \BrianFaust\Settingable\Store|mixed
     */
    public function settings($key = null)
    {
        return $key ? $this->settings()->get($key) : new Store($this);
    }
}
