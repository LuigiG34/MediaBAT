<?php

namespace App\Controllers;

use App\Models\PublicationClass;
use App\Models\PublicationManager;

class PublicationController
{
    private $PublicationManager;
    private $PublicationClass;

    public function __construct()
    {
        $this->PublicationManager = new PublicationManager;
        $this->PublicationClass = new PublicationClass;
    }
}