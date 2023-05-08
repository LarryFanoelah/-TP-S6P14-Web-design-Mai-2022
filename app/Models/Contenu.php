<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\str;


/**
 * Class Contenu
 * 
 * @property int $id_contenu
 * @property int $id_administrateur
 * @property string $titre
 * @property string $body
 * @property string|null $photo
 * @property string|null $lieu
 * @property Carbon|null $date_publication
 * 
 * @property Administrateur $administrateur
 *
 * @package App\Models
 */
class Contenu extends Model
{
	protected $table = 'contenu';
	protected $primaryKey = 'id_contenu';
	public $timestamps = false;

	protected $casts = [
		'id_administrateur' => 'int',
		'date_publication' => 'datetime'
	];

	protected $fillable = [
		'id_administrateur',
		'titre',
		'body',
		'photo',
		'lieu',
		'date_publication'
	];

	public function administrateur()
	{
		return $this->belongsTo(Administrateur::class, 'id_administrateur');
	}

	public function slug(){
        $str=str::slug($this->titre);
        info($str);
        return $str;
    }
}
