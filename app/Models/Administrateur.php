<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Administrateur
 * 
 * @property int $id_administrateur
 * @property string $nom
 * @property string $email
 * @property string|null $mdp
 * 
 * @property Collection|Contenu[] $contenus
 *
 * @package App\Models
 */
class Administrateur extends Model
{
	protected $table = 'administrateur';
	protected $primaryKey = 'id_administrateur';
	public $timestamps = false;

	protected $fillable = [
		'nom',
		'email',
		'mdp'
	];

	public function contenus()
	{
		return $this->hasMany(Contenu::class, 'id_administrateur');
	}
}
