<?php

namespace App\Enum;

enum PaiementStat:string 
{
    case payé="paye";
    case en_cours="en cours";
    case échoué="echoue";
    case refoulé="refoule";
}