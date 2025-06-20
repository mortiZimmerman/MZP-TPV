<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order extends Model
{
    
    use HasFactory;

    protected $fillable = ['table_id', 'user_id', 'total', 'status'];

    public function table()
    {
        return $this->belongsTo(Table::class);
    }
    
public function orderDetails()
{
    return $this->hasMany(OrderDetail::class);
}

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
