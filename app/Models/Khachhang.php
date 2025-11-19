<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Khachhang
 * 
 * @property string $sdt
 * @property string $ten
 * @property string|null $email
 * @property string $namsinh
 * @property string $GhiChu
 * @property string $diaChi
 * @property string $matKhau
 * 
 * @property Collection|Donhang[] $donhangs
 *
 * @package App\Models
 */
class Khachhang extends Model
{
	protected $table = 'khachhang';
	protected $primaryKey = 'sdt';
	public $incrementing = false;
	public $timestamps = false;

	protected $fillable = [
		'ten',
		'email',
		'namsinh',
		'GhiChu',
		'diaChi',
		'matKhau'
	];

	public function donhangs()
	{
		return $this->hasMany(Donhang::class, 'SdtNguoiDat');
	}
}
