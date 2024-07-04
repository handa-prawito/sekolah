<?php



namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Bank Model.
 */
class Bank extends Model
{
    use SoftDeletes;
    /**
     * Table name.
     *
     * @var string
     */
    protected $table = 'banks';
}