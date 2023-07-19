<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Administrateur
 * 
 * @property int $idadministrateur
 * @property string|null $email
 * @property string|null $mdp
 *
 * @package App\Models
 */
class Administrateur extends Model
{
	protected $table = 'administrateur';
	protected $primaryKey = 'idadministrateur';
	public $timestamps = false;

	protected $fillable = [
		'email',
		'mdp'
	];
}
