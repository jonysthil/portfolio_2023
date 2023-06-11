<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class ExperienceModel extends Model {

	protected $table      = 'experience';
	protected $primaryKey = 'exp_id';
	//protected $fillable   = [];
	public $timestamps    = false;
	protected $guarded    = [];
	public $incrementing  = false;

	public function scopeAllExperience($query) {
		return $query->select('*')
					->orderBy('exp_order', 'asc')
                    ->get();
	}

	public function scopeExperienceSave($query, $data) {
		return $query->insertGetId($data);
	}

	public function scopeExperienceGet($query, $exp_id) {
		return $query->select('*')
					->where('exp_id', $exp_id)
                    ->first();
	}

	public function scopeExperienceUpdate($query, $data, $exp_id) {
		return $query->where('exp_id', $exp_id)
					->update($data);
	}

	public function scopeDeleteExperience($query, $exp_id) {
		return $query->where('exp_id', $exp_id)
					->delete();
	}

	public function scopeOrderExperience($query, $exp_id, $exp_order) {
        return $query->where('exp_id', $exp_id)
                    ->where('exp_order', '!=', $exp_order)
                    ->update(array('exp_order' => $exp_order));
    }

	public function scopePublicExperienceAll($query) {
		return $query->select('*')
					->where('exp_status', 1)
					->orderBy('exp_order', 'asc')
                    ->get();
	}

	
}