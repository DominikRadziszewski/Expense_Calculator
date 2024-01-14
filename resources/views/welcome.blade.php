<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

        <!-- Styles -->
        <style>
            .card-body {
                margin: 10px;
                text-align: center;
            }
        </style>
    </head>

    @extends('layouts.app')

    @section('content')
    <div class="row justify-content-center">
        <div class="col-md-1">
            <div>
                <img src="{{ asset('storage/Logo.png') }}" alt="Logo" width="110px" height="120px">
            </div>
        </div>
    </div>
    <div class="container">
        <div class="card">
            <div class="row justify-content-center">
              

                
                
                
                <div class="card-body  mb-5">
                    Witaj w naszym kalkulatorze wydatków!<br><br>
                
                    Cieszymy się, że jesteś z nami, gotów lepiej zrozumieć swoje finanse. Nasz kalkulator pomoże Ci śledzić i analizować wydatki, dzięki czemu będziesz mógł podejmować bardziej świadome decyzje finansowe.<br><br>
                
                    Jak z niego korzystać? To proste! Wprowadź swoje codzienne, tygodniowe lub miesięczne wydatki, a kalkulator automatycznie przeliczy i przedstawi wyniki. Dzięki temu będziesz mógł zobaczyć, gdzie idą Twoje pieniądze i łatwiej zarządzać swoim budżetem.<br><br>
                
                    Pamiętaj, że śledzenie wydatków to kluczowy krok w osiąganiu finansowej stabilności. Bądź z nami na każdym kroku, a wspólnie pomożemy Ci lepiej zrozumieć swoje finanse i osiągnąć swoje cele.<br><br>
                
                    Zaczynajmy razem podróż ku lepszemu zarządzaniu finansami!
                </div>
            </div>
        </div>
    </div>
                <div class="ml-4 text-center text-sm text-gray-500 dark:text-gray-400 sm:text-right sm:ml-0">
                    Laravel v{{ Illuminate\Foundation\Application::VERSION }} (PHP v{{ PHP_VERSION }})
                </div>
            
    </body>
</html>
@endsection