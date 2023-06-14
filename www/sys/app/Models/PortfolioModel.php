<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class PortfolioModel extends Model {

	protected $table      = 'portfolio';
	protected $primaryKey = 'prt_id';
	protected $dates      = ['prt_date'];
	//protected $fillable   = [];
	public $timestamps    = false;
	protected $guarded    = [];
	public $incrementing  = false;

	public function scopePortfolioAll($query) {
		return $query->select('*')
					->orderBy('prt_order', 'asc')
                    ->get();
	}

	public function scopePortfolioSave($query, $data) {
		return $query->insertGetId($data);
	}

	public function scopePortfolioGet($query, $prt_id) {
		return $query->select('*')
					->join('portfolio_category', 'portfolio_category.pc_id', '=', 'portfolio.pc_id')
					->where('prt_id', $prt_id)
                    ->first();
	}

	public function scopePortfolioUpdate($query, $data, $prt_id) {
		return $query->where('prt_id', $prt_id)
					->update($data);
	}

	public function scopePortfolioDelete($query, $prt_id) {
		return $query->where('prt_id', $prt_id)
					->delete();
	}

	public function scopePortfolioOrder($query, $prt_id, $prt_order) {
        return $query->where('prt_id', $prt_id)
                    ->where('prt_order', '!=', $prt_order)
                    ->update(array('prt_order' => $prt_order));
    }

	
}