<?php

namespace LaravelWebauthn\Models\Casts;

use Illuminate\Contracts\Database\Eloquent\CastsAttributes;
use Webauthn\TrustPath\TrustPathLoader;

class TrustPath implements CastsAttributes
{
    /**
     * Cast the given value.
     *
     * @param  \Illuminate\Database\Eloquent\Model  $model
     * @param  string  $key
     * @param  mixed  $value
     * @param  array  $attributes
     * @return \Webauthn\TrustPath\TrustPath|null
     */
    public function get($model, $key, $value, $attributes): ?\Webauthn\TrustPath\TrustPath
    {
        return $value !== null ? TrustPathLoader::loadTrustPath(json_decode($value, true, flags: JSON_THROW_ON_ERROR)) : null;
    }

    /**
     * Prepare the given value for storage.
     *
     * @param  \Illuminate\Database\Eloquent\Model  $model
     * @param  string  $key
     * @param  mixed  $value
     * @param  array  $attributes
     * @return string
     */
    public function set($model, $key, $value, $attributes): string
    {
        return json_encode($value, flags: JSON_THROW_ON_ERROR);
    }
}
