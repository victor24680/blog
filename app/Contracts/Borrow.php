<?php
namespace App\Contracts;
abstract class Borrow
{
     abstract static function create();

     abstract static function getInfos();
}