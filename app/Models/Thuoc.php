<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Thuoc
 * 
 * @property string $maThuoc
 * @property string $tenThuoc
 * @property string $QuiCach
 * @property float $GiaTien
 * @property string $DanhMuc
 * @property string $DVTinh
 * @property string $NSX
 * @property string $ThanhPhan
 * @property string $CongDung
 * @property string $CachSuDung
 * @property array|null $HinhAnh
 * @property int $maLoai
 * @property bool $chiDinhCuaBacSi
 * @property float $giaKhuyenMai
 * @property Carbon $CreateAt
 * @property bool $isDelete
 * 
 * @property Loaithuoc $loaithuoc
 * @property Collection|Chitietdonhang[] $chitietdonhangs
 *
 * @package App\Models
 */
class Thuoc extends Model
{
	protected $table = 'thuoc';
	protected $primaryKey = 'maThuoc';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'GiaTien' => 'float',
		'HinhAnh' => 'json',
		'maLoai' => 'int',
		'chiDinhCuaBacSi' => 'bool',
		'giaKhuyenMai' => 'float',
		'CreateAt' => 'datetime',
		'isDelete' => 'bool'
	];

	protected $fillable = [
		'tenThuoc',
		'QuiCach',
		'GiaTien',
		'DanhMuc',
		'DVTinh',
		'NSX',
		'ThanhPhan',
		'CongDung',
		'CachSuDung',
		'HinhAnh',
		'maLoai',
		'chiDinhCuaBacSi',
		'giaKhuyenMai',
		'CreateAt',
		'isDelete'
	];

	public function loaithuoc()
	{
		return $this->belongsTo(Loaithuoc::class, 'maLoai');
	}

	public function chitietdonhangs()
	{
		return $this->hasMany(Chitietdonhang::class, 'maThuoc');
	}
}
