<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;

    public $table = 'settings';

    protected $fillable = [
        'company_name',
        'company_email',
        'company_phone',
        'company_address_line1',
        'company_address_line2',
    ];
}
