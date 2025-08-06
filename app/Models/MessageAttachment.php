<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MessageAttachment extends Model
{
    /** @use HasFactory<\Database\Factories\MessageAttachmentFactory> */
    use HasFactory;

    protected $fillable = [
       'messsage_id',
       'name',
       'path',
       'mime',
       'size',
    ];

    public function message()
    {
        return $this->belongsTo(Message::class, 'messsage_id');
    }
}
