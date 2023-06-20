<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class ContactModel extends Model {

	protected $table      = 'contact';
	protected $primaryKey = 'cnt_id';
	//protected $fillable   = [];
	public $timestamps    = false;
	protected $guarded    = [];
	public $incrementing  = false;

	public function scopeContactSave($query, $data) {
		return $query->insertGetId($data);
	}

	
}