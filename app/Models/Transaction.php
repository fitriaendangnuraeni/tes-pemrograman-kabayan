<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $table = 'transaction';

    protected $fillable = [
        'id',
        'code',
        'product_id',
        'item'
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
