<?php
namespace App\Models;
enum Permissions: int
{
    case System = 0;
    case Administrator = 1;
    case Member = 2;
}