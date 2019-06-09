<?php

declare(strict_types=1);

/*
 * This file is part of Laravel Settingable.
 *
 * (c) Brian Faust <hello@basecode.sh>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Artisanry\Settingable\Traits;

use Artisanry\Settingable\Models\Setting;
use Artisanry\Settingable\Store;
use Illuminate\Database\Eloquent\Relations\MorphMany;

trait HasSettings
{
    /**
     * @return \Illuminate\Database\Eloquent\Relations\MorphMany
     */
    public function settingsCollection(): MorphMany
    {
        return $this->morphMany(Setting::class, 'settingable');
    }

    /**
     * @return \Artisanry\Settingable\Store|mixed
     */
    public function settings($key = null)
    {
        return $key ? $this->settings()->get($key) : new Store($this);
    }
}
