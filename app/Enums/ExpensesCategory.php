<?php

namespace App\Enums;

enum  ExpensesCategory:string{


const flat = 'mieszkanie';
const food  = 'jedzenie';
const Agd = 'agd';
const transport = 'transport';
const other = 'inne';

const ExpensesCategory = [
    self::flat,
    self::food,
    self::Agd,
    self::transport,
    self::other,
];

}