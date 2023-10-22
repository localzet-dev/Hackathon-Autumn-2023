<?php

/**
 * @package     Triangle Web
 * @link        https://github.com/Triangle-org
 *
 * @copyright   2018-2023 Localzet Group
 * @license     https://mit-license.org MIT
 */

namespace app\model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use support\Model;

/**
 * @property mixed $_id
 * @property mixed $email
 * @property mixed $firstname
 * @property mixed $lastname
 * @property mixed $middlename
 */
class User extends Model
{
    use HasFactory;

    protected $table = 'users';

    public $timestamps = false;

    protected $guarded = [];

    protected $attributes = [
        'status' => 'true',
    ];

    public function questions()
    {
        return $this->hasMany(Question::class);
    }
}
