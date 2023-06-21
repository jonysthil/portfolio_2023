<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class ContactModel extends Model {

	protected $table      = 'contact';
	protected $primaryKey = 'cnt_id';
	protected $dates = ['cnt_date'];
	//protected $fillable   = [];
	public $timestamps = false;
	protected $guarded = [];
	public $incrementing = false;

	public function scopeContactAll($query) {
		return $query->select('*')
					->orderBy('cnt_id', 'desc')
                    ->get();
	}

	public function scopeContactGet($query, $cnt_id) {
		return $query->select('*')
					->where('cnt_id', $cnt_id)
                    ->first();
	}

	public function scopeContactSave($query, $data) {
		return $query->insertGetId($data);
	}

	public function scopeContactUpdate($query, $data, $cnt_id) {
		return $query->where('cnt_id', $cnt_id)
					->update($data);
	}

	
}