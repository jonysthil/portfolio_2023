<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class AboutModel extends Model {

	protected $table      = 'about';
	protected $primaryKey = 'ab_id';
	//protected $fillable   = [];
	public $timestamps    = false;
	protected $guarded    = [];
	public $incrementing  = false;

	public function scopeSelectAbout($query) {
		return $query->select('*')
                    ->where('ab_id', 1)
                    ->first();
	}

	public function scopeAboutSave($query, $data) {
        return $query->where('ab_id', 1)
					->update($data);
	}

	
}