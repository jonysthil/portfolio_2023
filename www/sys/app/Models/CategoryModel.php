<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class CategoryModel extends Model {

	protected $table      = 'portfolio_category';
	protected $primaryKey = 'pc_id';
	//protected $fillable   = [];
	public $timestamps    = false;
	protected $guarded    = [];
	public $incrementing  = false;

	public function scopeCategoryGet($query) {
		return $query->select('*')
                    ->get();
	}

	public function scopeCategorySave($query, $data) {
		return $query->insertGetId($data);
	}

	public function scopeCategoryDelete($query, $pc_id) {
		return $query->where('pc_id', $pc_id)
					->delete();
	}
	
}