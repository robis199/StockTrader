<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Transactions extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'company',
        'company_symbol',
        'bought_at',
        'buying_price',
        'amount_acquired',
        'sold_at',
        'selling_price',
    ];
}
