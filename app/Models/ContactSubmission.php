<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ContactSubmission extends Model
{
    protected $fillable = ['name', 'email', 'phone', 'message', 'status'];
    
    protected $casts = [
        'status' => 'string',
    ];
    
    public const STATUS_NEW = 'new';
    public const STATUS_READ = 'read';
    public const STATUS_ARCHIVED = 'archived';
}
