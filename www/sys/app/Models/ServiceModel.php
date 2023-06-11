<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class ServiceModel extends Model {

	protected $table      = 'service';
	protected $primaryKey = 'ser_id';
	//protected $fillable   = [];
	public $timestamps    = false;
	protected $guarded    = [];
	public $incrementing  = false;

	public function scopeServiceAll($query) {
		return $query->select('*')
					->orderBy('ser_order', 'asc')
                    ->get();
	}

	public function scopeServiceSave($query, $data) {
		return $query->insertGetId($data);
	}

	public function scopeServiceGet($query, $ser_id) {
		return $query->select('*')
					->where('ser_id', $ser_id)
                    ->first();
	}

	public function scopeServiceUpdate($query, $data, $ser_id) {
		return $query->where('ser_id', $ser_id)
					->update($data);
	}

	public function scopeDeleteService($query, $ser_id) {
		return $query->where('ser_id', $ser_id)
					->delete();
	}

	public function scopeOrderService($query, $ser_id, $ser_order) {
        return $query->where('ser_id', $ser_id)
                    ->where('ser_order', '!=', $ser_order)
                    ->update(array('ser_order' => $ser_order));
    }

	public function scopePublicServiceAll($query) {
		return $query->select('*')
					->where('ser_status', 1)
					->orderBy('ser_order', 'asc')
                    ->get();
	}

	
}