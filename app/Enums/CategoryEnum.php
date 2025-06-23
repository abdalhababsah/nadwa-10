<?php

namespace App\Enums;

enum CategoryEnum :string
{
    case Residential = 'residential';
    case Interior = 'interior';
    case Commercial  = 'commercial';
    case Landscape   = 'landscape';
}