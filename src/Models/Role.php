<?php

namespace DonkeyCommerce\OneScopes\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    /**
	 * The explicit cast to execute.
	 * 
	 * @author Daniele Tulone <danieletulone.work@gmail.com>
	 *
	 * @var array
	 */
	protected $casts = [
		'scopes' => 'json',
    ];
    
	/**
	 * Tha attributes that are mass assignable.
	 * 
	 * @author Daniele Tulone <danieletulone.work@gmail.com>
	 *
	 * @var array
	 */
	protected $fillable = [
		'name',
		'scopes'
	];
	
	/**
	 * Relationship with User model
	 * 
	 * @author Daniele Tulone <danieletulone.work@gmail.com> 
	 *
	 * @return void
	 */
	public function users()
	{
		return $this->hasMany(config('auth.providers.users.model'));
	}
}