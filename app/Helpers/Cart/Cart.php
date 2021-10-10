<?php

namespace App\Helpers\Cart;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Facade;


/**
 * Class Cart
 * @package app/Helper/Cart
 * @method static bool has($id)
 * @method static Collection all();
 * @method static array get($id);
 * @method static Cart put(array $value , Model $obj = null );
 * @method static Collection update($key ,$options);
 * @method static bool count($key);
 * @method static bool delete($key);
 *
 */
class Cart extends Facade
{
       protected static function getFacadeAccessor()
       {
           return 'cart';
       }
}
