<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class GitIssue extends Model
{
    use HasFactory;
    use SoftDeletes;

    public $fillable = ['id', 'title', 'body', 'status_id'];

    protected $appends = ['state'];

    public function getStateAttribute()
    {
        return $this->status->code;
    }

    public function status()
    {
        return $this->belongsTo(Status::class);
    }
}
