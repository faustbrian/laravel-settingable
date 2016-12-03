<?php

/*
 * This file is part of Laravel Settingable.
 *
 * (c) Brian Faust <hello@brianfaust.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

/*
 * This file is part of Laravel Settingable.
 *
 * (c) Brian Faust <hello@brianfaust.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace BrianFaust\Settingable;

use Illuminate\Database\Eloquent\Model;

class Store
{
    /** @var \Illuminate\Database\Eloquent\Model */
    private $model;

    /** @var string */
    private $collection = 'default';

    /**
     * @param \Illuminate\Database\Eloquent\Model $model
     */
    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    /**
     * Get the specified setting value.
     *
     * @param string $key
     *
     * @return Model
     */
    public function get(string $key): Model
    {
        $query = $this->getSettingsCollection()->whereKey($key);

        if ($this->collection) {
            $query = $query->whereCollection($this->collection);
        }

        return $query->firstOrFail();
    }

    /**
     * Set a given setting value.
     *
     * @param string $key
     * @param mixed  $value
     *
     * @return bool
     */
    public function set(string $key, $value): bool
    {
        $data = [
            'key'        => $key,
            'value'      => $value,
            'collection' => $this->collection,
        ];

        if ($this->has($key)) {
            return $this->get($key)->update($data);
        }

        return (bool) $this->getSettingsCollection()->create($data);
    }

    /**
     * Determine if the given configuration value exists.
     *
     * @param string $key
     *
     * @return bool
     */
    public function has(string $key): bool
    {
        $query = $this->getSettingsCollection()->whereKey($key);

        if ($this->collection) {
            $query = $query->whereCollection($this->collection);
        }

        return $query->count() > 0;
    }

    /**
     * Remove an item from the settings.
     *
     * @param string $key
     *
     * @return bool
     */
    public function forget(string $key): bool
    {
        $query = $this->getSettingsCollection()->whereKey($key);

        if ($this->collection) {
            $query = $query->whereCollection($this->collection);
        }

        return (bool) $query->delete();
    }

    /**
     * Get all of the configuration items for the application.
     *
     * @return array
     */
    public function all()
    {
        $query = $this->model->settingsCollection();

        if ($this->collection) {
            $query = $query->whereCollection($this->collection);
        }

        return $query->get();
    }

    /**
     * @param string $value
     *
     * @return SettingStore
     */
    public function collection(string $value): SettingStore
    {
        $this->collection = $value;

        return $this;
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\MorphMany
     */
    private function getSettingsCollection()
    {
        return $this->model->settingsCollection();
    }
}
