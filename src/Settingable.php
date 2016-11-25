<?php

namespace BrianFaust\Settingable;

use Illuminate\Database\Eloquent\Relations\MorphMany;

trait Settingable
{
    /**
     * @return \Illuminate\Database\Eloquent\Relations\MorphMany
     */
    public function settingsCollection() : MorphMany
    {
        return $this->morphMany(Setting::class, 'settingable');
    }

    /**
     * [settings description].
     *
     * @return [type] [description]
     */
    public function settings() : SettingStore
    {
        return new SettingStore($this);
    }
}
