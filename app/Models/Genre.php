<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Genre
 * 
 * @property int $idgenre
 * @property string|null $sexe
 * 
 * @property Collection|Patient[] $patients
 *
 * @package App\Models
 */
class Genre extends Model
{
	protected $table = 'genre';
	protected $primaryKey = 'idgenre';
	public $timestamps = false;

	protected $fillable = [
		'sexe'
	];

	public function patients()
	{
		return $this->hasMany(Patient::class, 'idgenre');
	}
}
