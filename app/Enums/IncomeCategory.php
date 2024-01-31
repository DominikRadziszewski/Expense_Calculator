<?php

namespace App\Enums;

enum  IncomeCategory: string
{


    const salary = 'Wypłata';
    const sideline  = 'Fucha';
    const sprzedaż = 'Sprzedaż';

    const IncomeCategory = [
        self::salary,
        self::sideline,
        self::sprzedaż,
    ];
}
