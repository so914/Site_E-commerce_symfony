<?php
namespace App\Enum;

enum CommandeStatut:String
{
    case en_cours="en_cours";
    case en_attente ="en_attente";
    case livrée="livree";
}