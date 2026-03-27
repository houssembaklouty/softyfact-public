<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ContactLead extends Model
{
    protected $fillable = [
        'name',
        'company',
        'phone',
        'message',
        'source_page',
        'ip_address',
    ];
}
