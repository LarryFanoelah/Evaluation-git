<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Typedepense
 * 
 * @property int $idtypedepense
 * @property string|null $nom
 * @property string|null $type
 * @property float|null $budget
 * @property string|null $code
 * 
 * @property Collection|Depense[] $depenses
 *
 * @package App\Models
 */
class Typedepense extends Model
{
	protected $table = 'typedepense';
	protected $primaryKey = 'idtypedepense';
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

	public function depenses()
	{
		return $this->hasMany(Depense::class, 'idtypedepense');
	}
}
