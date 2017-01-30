<?php

namespace Sahib\Bagu\Models;

use Illuminate\Database\Eloquent\Model;

class BaguLog extends Model
{
    protected $fillable = [
        'level',
        'message',
        'context',
        'exception',
        'script_path',
        'script_line',
        'code',
        'trace',
        'request_client',
        'request_method',
        'request_input',
        'request_path',
    ];
}
