<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Patient
 * 
 * @property int $idpatient
 * @property string|null $nom
 * @property Carbon|null $date_naissance
 * @property bool|null $remboursement
 * @property int|null $idgenre
 * 
 * @property Genre|null $genre
 * @property Collection|Facturerecette[] $facturerecettes
 *
 * @package App\Models
 */
class Patient extends Model
{
	protected $table = 'patient';
	protected $primaryKey = 'idpatient';
	public $timestamps = false;

	protected $casts = [
		'date_naissance' => 'datetime',
		'remboursement' => 'bool',
		'idgenre' => 'int'
	];

	protected $fillable = [
		'nom',
		'date_naissance',
		'remboursement',
		'idgenre'
	];

	public function genre()
	{
		return $this->belongsTo(Genre::class, 'idgenre');
	}

	public function facturerecettes()
	{
		return $this->hasMany(Facturerecette::class, 'idpatient');
	}
}
