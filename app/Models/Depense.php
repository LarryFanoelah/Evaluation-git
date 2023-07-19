<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Depense
 * 
 * @property int $iddepense
 * @property int|null $idtypedepense
 * @property Carbon|null $date_depense
 * @property int|null $nombre
 * @property float|null $montant
 * 
 * @property Typedepense|null $typedepense
 *
 * @package App\Models
 */
class Depense extends Model
{
	protected $table = 'depense';
	protected $primaryKey = 'iddepense';
	public $timestamps = false;

	protected $casts = [
		'idtypedepense' => 'int',
		'date_depense' => 'datetime',
		'nombre' => 'int',
		'montant' => 'float'
	];

	protected $fillable = [
		'idtypedepense',
		'date_depense',
		'nombre',
		'montant'
	];

	public function typedepense()
	{
		return $this->belongsTo(Typedepense::class, 'idtypedepense');
	}
}
