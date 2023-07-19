<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Typerecette
 * 
 * @property int $idtyperecette
 * @property string|null $nom
 * @property string|null $type
 * @property float|null $budget
 * @property string|null $code
 * 
 * @property Collection|Recette[] $recettes
 *
 * @package App\Models
 */
class Typerecette extends Model
{
	protected $table = 'typerecette';
	protected $primaryKey = 'idtyperecette';
	public $timestamps = false;

	protected $casts = [
		'budget' => 'float'
	];

	protected $fillable = [
		'nom',
		'type',
		'budget',
		'code'
	];

	public function recettes()
	{
		return $this->hasMany(Recette::class, 'idtyperecette');
	}
}
