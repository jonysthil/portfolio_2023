<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class PortfolioGalleryModel extends Model {

	protected $table      = 'portfolio_gallery';
	protected $primaryKey = 'pg_id';
	//protected $dates      = ['prt_date'];
	//protected $fillable   = [];
	public $timestamps    = false;
	protected $guarded    = [];
	public $incrementing  = false;

	public function scopePortfolioGalleryAll($query, $prt_id) {
		return $query->select('*')
					->where('prt_id', $prt_id)
					->orderBy('pg_order', 'asc')
                    ->get();
	}

	public function scopeSaveImage($query, $data) {
		return $query->insertGetId($data);
	}

	public function scopePortfolioGalleryGet($query, $pg_id) {
		return $query->select('*')
					->where('pg_id', $pg_id)
                    ->first();
	}

	public function scopePortfolioGalleryUpdate($query, $data, $pg_id) {
		return $query->where('pg_id', $pg_id)
					->update($data);
	}

	public function scopePortfolioGalleryDelete($query, $pg_id) {
		return $query->where('pg_id', $pg_id)
					->delete();
	}

	public function scopePortfolioGalleryOrder($query, $pg_id, $pg_order) {
        return $query->where('pg_id', $pg_id)
                    ->where('pg_order', '!=', $pg_order)
                    ->update(array('pg_order' => $pg_order));
    }

	public function scopePortfolioGalleryHeat($query, $data, $pg_id, $prt_id) {
		$query->where('prt_id', $prt_id)
					->update(array('pg_head' => 0));

		return $query->where('pg_id', $pg_id)
					->update($data);
	}

	public function scopePortfolioGalleryCount($query, $prt_id) {
		return $query->where('prt_id', $prt_id)->count();
	}

	public function scopeSelectHead($query, $prt_id) {
		return $query->select('*')
					->where('prt_id', $prt_id)
					->where('pg_head', 1)
                    ->first();
	}

	public function scopeSelectHeadRandom($query, $prt_id) {
		return $query->select('*')
					->where('prt_id', $prt_id)
					->inRandomOrder()
                    ->first();
	}

	public function scopePublicPortfolioGalleryAll($query, $prt_id) {
		return $query->select('*')
					->where('prt_id', $prt_id)
					->orderBy('pg_order', 'asc')
                    ->get();
	}

	public function scopePublicPortfolioGalleryGet($query, $pg_id) {
		return $query->select('*')
					->where('pg_id', $pg_id)
                    ->first();
	}

}