<?php

namespace DanieleTulone\OneScopes\Models;

use Illuminate\Database\Eloquent\Model;

class Scope extends Model
{
    /**
     * List crud actions. Useful for seeder.
     * 
     * @author Daniele Tulone <danieletulone.work@gmail.com>
     *
     * @var array
     */
    public static array $crudActions = [
        'create', 
        'read', 
        'update', 
        'delete',
        'manage',
    ];

    /**
     * The attributes that are mass assignable.
     * 
     * @author Daniele Tulone <danieletulone.work@gmail.com>
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'description'
    ];

    /**
     * List of all resource of app. Useful for seeder.
     * 
     * @author Daniele Tulone <danieletulone.work@gmail.com>
     *
     * @var array
     */
    public static array $resources = [
        //
    ];

    /**
     * Scopes to add. Useful for seeder.
     * 
     * @author Daniele Tulone <danieletulone.work@gmail.com>
     *
     * @var array
     */
    public static array $scopes = [
        //
    ];

     /**
     * Indicates if the model should be timestamped.
     * 
     * @author Daniele Tulone <danieletulone.work@gmail.com>
     *
     * @var boolean
     */
    public $timestamps = false;
}