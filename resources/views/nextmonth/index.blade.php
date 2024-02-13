@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="row align-items-center">
                        <div class="col">
                            <img src="{{ asset('storage/Logo.png') }}" alt="Logo" width="110px" height="120px">
                        </div>
                        <div class="col text-center">
                            <button id="previousMonthButton" class="btn btn-primary"
                                onclick="window.location.href='{{ route('nextmonth.index', ['month' => sprintf('%02d', max(1, $month - 1))]) }}'">
                                Poprzedni Miesiąc
                            </button>
                            <span class="h2">
                                @php
                                use App\Helpers\MonthHelper;
                                echo MonthHelper::getMonthName($month);
                                @endphp
                            </span>
                            <button id="nextMonthButton" class="btn btn-primary"
                                onclick="window.location.href='{{ route('nextmonth.index', ['month' => sprintf('%02d', min(12, $month + 1))]) }}'">
                                Następny Miesiąc ->
                            </button>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="card bg-light mb-3 text-center">
                                <div class="card-body">
                                    <h5 class="card-title">Łączny Przychód</h5>
                                    <p class="card-text">{{ number_format($general_income, 2, ',', ' ') }} zł</p>
                                </div>
                            </div>
                            <div class="card bg-light mb-3 text-center">
                                <div class="card-body">
                                    <h5 class="card-title">Łączne Wydatki</h5>
                                    <p class="card-text">{{ number_format($general_expenses, 2, ',', ' ') }} zł</p>
                                </div>
                            </div>
                            <div class="card bg-light mb-3 text-center ">
                                <div class="card-body" style="{{ number_format(($general_income - $general_expenses)) > 0 ? 'color: green;' : 'color: red;' }}">
                                    <h5 class="card-title">Bilans</h5>
                                    <p class="card-text" >
                                        {{ number_format(($general_income - $general_expenses), 2, ',', ' ') }} zł
                                    </p>
                                    
                                </div>
                            </div>
                        </div>
                        <div class="col-md-9">
                            <div class="card bg-light mb-3">
                                <div class="card-body">
                                    <h5 class="card-title">Rzeczywisty Przychód</h5>
                                    <div style="overflow: auto; max-height: 300px;">
                                        <div id="app">
                                            <table-component :items="{{ json_encode($incomes) }}"></table-component>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card bg-light mb-3">
                                <div class="card-body">
                                    <h5 class="card-title">Rzeczywiste Wydatki</h5>
                                    <div style="overflow: auto; max-height: 300px;">
                                        <div id="app">
                                            <table-component :items="{{ json_encode($expenses) }}"></table-component>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer text-right">
                    <a href="{{ route('report.index', [$month]) }}" class="btn btn-primary">Raport</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script src="{{ mix('js/app.js') }}"></script>
@endpush