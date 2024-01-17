<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Expenses extends Model
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
    public static function filterExpensesByMonth($query, $month)
    {
        $startOfMonth = now()->startOfMonth();
        $endOfMonth = now()->endOfMonth();
    
        if (is_numeric($month)) {
            $startOfMonth->month($month);
            $endOfMonth->month($month);
        }
        return $query->whereBetween('date', [$startOfMonth, $endOfMonth]);
    }
}
