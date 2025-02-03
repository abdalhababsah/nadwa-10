<?php

namespace App\Enums;

enum CategoryEnum :string
{
    case Interior = 'interior';
    case Residential = 'residential';
    case Commercial  = 'commercial';
    case Landscape   = 'landscape';
}