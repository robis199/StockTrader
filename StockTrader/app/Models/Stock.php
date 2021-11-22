<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Stock extends Model
{
    use HasFactory;

    protected $fillable = [
        'company',
        'company_symbol',
        'buying_price',
        'selling_price',
        'amount_acquired',
    ];


    public function user() :BelongsTo
    {
        return $this->belongsTo(User::class, 'foreign_key');
    }
}
