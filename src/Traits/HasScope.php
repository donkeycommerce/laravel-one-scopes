<?php

namespace DanieleTulone\OneScopes\Traits;

trait HasScope
{
    /**
     * Check if current user has a scope.
     *
     * @author Daniele Tulone <danieletulone.work@gmail.com>
     * 
     * @param string $scope
     * @return boolean
     */
    public function hasScope(string $scope): bool
    {
        return in_array($scope, $this->role->scopes);
    }

    /**
     * Check if current user has a set of scopes.
     *
     * @author Daniele Tulone <danieletulone.work@gmail.com>
     * 
     * @param array $scopes
     * @return boolean
     */
    public function hasScopes(array $scopes): bool
    {
        $has = true;

        foreach ($scopes as $scope) {
            if (!$this->hasScope($scope)) {
                $has = false;
                break;
            }
        }

        return $has;
    }

    /**
     * Get the role of user.
     * 
     * @author Daniele Tulone <danieletulone.work@gmail.com>
     *
     * @return void
     */
    public function role()
    {
        return $this->belongsTo('DanieleTulone\OneScopes\Models\Role');
    }
}