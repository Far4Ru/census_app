<?php

namespace App\Model\Entity;

use Cake\ORM\Entity;

class Citizen extends Entity
{
    protected $_accessible = [
        "name" => true,
        "age" => true
    ];
}
