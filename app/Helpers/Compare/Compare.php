<?php

namespace App\Helpers\Compare;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Facade;


/**
 * Class Cart
 * @package app/Helper/Compare
 * @method static bool has($id)
 * @method static Collection all();
 * @method static array get($id);
 * @method static Cart put(array $value , Model $obj = null );
 * @method static Collection update($key ,$options);
 * @method static bool count($key);
 * @method static bool delete($key);
 *
 */
class Compare extends Facade
{
       protected static function getFacadeAccessor()
       {
           return 'compare';
       }
}
