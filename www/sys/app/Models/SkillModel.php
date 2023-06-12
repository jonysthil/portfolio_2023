<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class SkillModel extends Model {

	protected $table      = 'skill';
	protected $primaryKey = 'sk_id';
	//protected $fillable   = [];
	public $timestamps    = false;
	protected $guarded    = [];
	public $incrementing  = false;

	public function scopeSkillAll($query) {
		return $query->select('*')
					->orderBy('sk_order', 'asc')
                    ->get();
	}

	public function scopeSkillSave($query, $data) {
		return $query->insertGetId($data);
	}

	public function scopeSkillGet($query, $sk_id) {
		return $query->select('*')
					->where('sk_id', $sk_id)
                    ->first();
	}

	public function scopeSkillDelete($query, $sk_id) {
		return $query->where('sk_id', $sk_id)
					->delete();
	}

	public function scopeSkillUpdate($query, $data, $sk_id) {
		return $query->where('sk_id', $sk_id)
					->update($data);
	}
	
	public function scopeSkillOrder($query, $sk_id, $sk_order) {
        return $query->where('sk_id', $sk_id)
                    ->where('sk_order', '!=', $sk_order)
                    ->update(array('sk_order' => $sk_order));
    }

	public function scopePublicSkillAll($query) {
		return $query->select('*')
					->where('sk_status', 1)
					->orderBy('sk_order', 'asc')
                    ->get();
	}

	
}