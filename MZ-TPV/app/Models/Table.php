<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Table extends Model
{
    protected $fillable = ['number', 'status', 'x', 'y'];

    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}