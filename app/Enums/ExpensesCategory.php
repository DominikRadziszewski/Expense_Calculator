<?php

namespace App\Enums;

enum  ExpensesCategory:string{


const flat = 'Mieszkanie';
const food  = 'Jedzenie';
const Agd = 'Agd';
const transport = 'Transport';
const other = 'Inne';

const ExpensesCategory = [
    self::flat,
    self::food,
    self::Agd,
    self::transport,
    self::other,
];

}