<?php

namespace Search\Sdk\Models;

use Search\Sdk\Models\Model;

class Audio extends Model
{
    public function getAudios(): string
    {
      return $this->getValue('audios');
   }

}