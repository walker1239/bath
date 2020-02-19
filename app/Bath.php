<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Bath
 *
 * @package App
 * @property string $latitude
 * @property string $longitude
 * @property string $code_qr
*/
class Bath extends Model
{
    use SoftDeletes;

    protected $fillable = ['code_qr','company'];
    
    
    
}
