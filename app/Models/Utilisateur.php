<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Utilisateur
 * 
 * @property int $idutilisateur
 * @property string|null $email
 * @property string|null $mdp
 *
 * @package App\Models
 */
class Utilisateur extends Model
{
	protected $table = 'utilisateur';
	protected $primaryKey = 'idutilisateur';
	public $timestamps = false;

	protected $fillable = [
		'email',
		'mdp'
	];
}
