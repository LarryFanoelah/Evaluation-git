<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Recette
 * 
 * @property int $idrecette
 * @property int|null $idtyperecette
 * @property int|null $nombre
 * @property int|null $idfacturerecette
 * @property float|null $montant
 * 
 * @property Typerecette|null $typerecette
 * @property Facturerecette|null $facturerecette
 *
 * @package App\Models
 */
class Recette extends Model
{
	protected $table = 'recette';
	protected $primaryKey = 'idrecette';
	public $timestamps = false;

	protected $casts = [
		'idtyperecette' => 'int',
		'nombre' => 'int',
		'idfacturerecette' => 'int',
		'montant' => 'float'
	];

	protected $fillable = [
		'idtyperecette',
		'nombre',
		'idfacturerecette',
		'montant'
	];

	public function typerecette()
	{
		return $this->belongsTo(Typerecette::class, 'idtyperecette');
	}

	public function facturerecette()
	{
		return $this->belongsTo(Facturerecette::class, 'idfacturerecette');
	}
}
