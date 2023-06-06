<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class UserModel extends Model {

	protected $table      = 'admin';
	protected $primaryKey = 'ad_id';
	//protected $fillable   = [];
	public $timestamps    = false;
	protected $guarded    = [];
	public $incrementing  = false;

	public function scopeLogin($query, $data) {
		return $query->select('*')
                    ->where('ad_email',   $data["ad_email"])
                    ->where('ad_password',$data["ad_password"])
                    ->first();
	}

	
}