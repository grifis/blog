<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Knowledge extends Model
{
    function ramdom(int $limit=1)
    {
        return $this->inRandomOrder()->take($limit)->first();
    }
}
