<?php

namespace App\Models;


use Phalcon\Mvc\Model;
use Phalcon\Validation;
use Phalcon\Validation\Validator\Email as EmailValidator;
use Phalcon\Validation\Validator\Uniqueness as UniquenessValidator;

class Wxusers extends Model
{


    function getSource()
    {
        return "Persons";
    }
}
