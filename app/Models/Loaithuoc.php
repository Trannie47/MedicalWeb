<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Loaithuoc
 * 
 * @property int $maLoai
 * @property string $TenLoai
 * @property string $GhiChu
 * 
 * @property Collection|Thuoc[] $thuocs
 *
 * @package App\Models
 */
class Loaithuoc extends Model
{
	protected $table = 'loaithuoc';
	protected $primaryKey = 'maLoai';
	public $timestamps = false;

	protected $fillable = [
		'TenLoai',
		'GhiChu'
	];

	public function thuocs()
	{
		return $this->hasMany(Thuoc::class, 'maLoai');
	}

	
}
