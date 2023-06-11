<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class EducationModel extends Model {

	protected $table      = 'education';
	protected $primaryKey = 'edu_id';
	//protected $fillable   = [];
	public $timestamps    = false;
	protected $guarded    = [];
	public $incrementing  = false;

	public function scopeAllEducation($query) {
		return $query->select('*')
					->orderBy('edu_order', 'asc')
                    ->get();
	}

	public function scopeEducationSave($query, $data) {
		return $query->insertGetId($data);
	}

	public function scopeEducationGet($query, $edu_id) {
		return $query->select('*')
					->where('edu_id', $edu_id)
                    ->first();
	}

	public function scopeEducationUpdate($query, $data, $edu_id) {
		return $query->where('edu_id', $edu_id)
					->update($data);
	}

	public function scopeDeleteEducation($query, $edu_id) {
		return $query->where('edu_id', $edu_id)
					->delete();
	}

	public function scopeOrderEducation($query, $edu_id, $edu_order) {
        return $query->where('edu_id', $edu_id)
                    ->where('edu_order', '!=', $edu_order)
                    ->update(array('edu_order' => $edu_order));
    }

	public function scopePublicEducationAll($query) {
		return $query->select('*')
					->where('edu_status', 1)
					->orderBy('edu_order', 'asc')
                    ->get();
	}

	
}