<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class PortfolioCategoryModel extends Model {

	protected $table      = 'portfolio_category';
	protected $primaryKey = 'prtca_id';
	//protected $fillable   = [];
	public $timestamps    = false;
	protected $guarded    = [];
	public $incrementing  = false;

	public function scopeProyectCategoryGet($query, $prt_id) {
		return $query->select('*')
					->where('prt_id', $prt_id)
                    ->get();
	}

	public function scopeProyectCategorySave($query, $data) {
		return $query->insertGetId($data);
	}

	public function scopeProyectCategoryDelete($query, $data) {
		return $query->where($data)
					->delete();
	}
	
}