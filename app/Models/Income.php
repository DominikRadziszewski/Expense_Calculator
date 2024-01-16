<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Income extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'category',
        'amount',
        'date',
        'user_id',
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public static function filterIncomesByMonth($query, $format, $date)
    {
        return $query->whereMonth('date', date($format, strtotime($date)));
    }
}
