<?php

namespace DanieleTulone\OneScopes;

use Cache;

/**
 * Helper class for work better with scopes.
 */
class OneScopes
{
    /*
    |--------------------------------------------------------------------------
    | ScopeHelper
    |--------------------------------------------------------------------------
    |
    | This helper class provides many function to work better with scopes.
    | You can get scopes from db or cache, bye bye hard coded definition
    */

    private $scopeClass = 'DanieleTulone\OneScopes\Scope';
    
    /**
     * Get all scopes. Automatically get from cache or from scopes table.
     * 
     * @author Daniele Tulone <danieletulone.work@gmail.com>
     */
    public static function all(): array
    {
        return self::getFromCache() ?? self::getFromDb();
    }

    /**
     * Store into cache.
     * 
     * @author Daniele Tulone <danieletulone.work@gmail.com>
     */
    public static function cache(array $items): void
    {
        Cache::forever('scopes', $items);
    }

    /**
     * Convert the scopes array for passport array schema.
     * 
     * @author Daniele Tulone <danieletulone.work@gmail.com>
     *
     * @return array
     */
    public static function forPassport(): array
    {
        $scopes = self::all();
        $forPassport = [];

        foreach ($scopes as $scope) {
            $forPassport[$scope['name']] = $scope['description']; 
        }

        return $forPassport;
    }

    /**
     * Get all scopes from cache.
     * 
     * @author Daniele Tulone <danieletulone.work@gmail.com>
     *
     * @return null|array Null or array containing scopes.
     */
    public static function getFromCache()
    {
        return Cache::get('scopes');
    }

    /**
     * Get all scopes from db.
     * 
     * @author Daniele Tulone <danieletulone.work@gmail.com>
     * 
     * @param bool $forceCache If true store scopes retrived by db into cache.
     * @return array An array containing all scopes.
     */
    public static function getFromDb(bool $forceCache = true): array
    {
        $scopes = self::$scopeClass::select(['name', 'description'])->get()->toArray();

        if ($forceCache) {
            self::cache($scopes);
        }

        return $scopes;
    }

    /**
     * Get scopes from db or cache. Use this in AuthServiceProvider
     * 
     * @author Daniele Tulone <danieletulone.work@gmail.com>
     *
     * @return array
     */
    private function getScopes(): array
    {
        if (php_sapi_name() !== 'cli') {
            return ScopeHelper::forPassport();
        }

        return [];
    }

    /**
     * Reset the cache of scopes.
     * 
     * @author Daniele Tulone <danieletulone.work@gmail.com>
     *
     * @return void
     */
    public static function reset(): void
    {
        Cache::forget('scopes');
    }

    /**
     * Use the given model as Scope model.
     * 
     * @author Daniele Tulone <danieletulone.work@gmail.com>
     *
     * @param [type] $model
     * @return void
     */
    public static function useModel($model): void 
    {
        self::$scopeClass = $model;
    }
}