<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Facturerecette
 * 
 * @property int $idfacturerecette
 * @property int|null $idpatient
 * @property Carbon|null $date_facture
 * 
 * @property Patient|null $patient
 * @property Collection|Recette[] $recettes
 *
 * @package App\Models
 */
class Facturerecette extends Model
{
	protected $table = 'facturerecette';
	protected $primaryKey = 'idfacturerecette';
	public $timestamps = false;

	protected $casts = [
		'idpatient' => 'int',
		'date_facture' => 'datetime'
	];

	protected $fillable = [
		'idpatient',
		'date_facture'
	];

	public function patient()
	{
		return $this->belongsTo(Patient::class, 'idpatient');
	}

	public function recettes()
	{
		return $this->hasMany(Recette::class, 'idfacturerecette');
	}
}
