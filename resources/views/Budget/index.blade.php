@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="row justify-content-center">
            <div class="col-md-1">
                <div>
                    <img src="{{ asset('storage/Logo.png') }}" alt="Logo" width="110px" height="120px">
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-2">
                <div class="card-body bg-light mb-3">
                    Planowany Przychód
                </div>
            </div>
            <div class="col-6 col-md-3">
                <div class="card-body bg-light mb-3">
                    Rzeczywisty Przychód
                    <div style="overflow: auto; max-height: 300px;">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">Data</th>
                                    <th scope="col">Nazwa</th>
                                    <th scope="col">Ile</th>
                                    <th scope="col">Category</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($incomes as $income)
                                    <tr>
                                        <td>{{ $income->date }}</td>
                                        <td>{{ $income->name }}</td>
                                        <td>{{ $income->amount }}</td>
                                        <td>{{ $income->category }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-md-1">
                <div class="card-body bg-light mb-3">
                    Bilans
                </div>
            </div>
            <div class="col-md-3">
                <div class="card-body bg-light mb-2">
                    Rzeczywiste wydatki
                    <div style="overflow: auto; max-height: 300px;">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">Data</th>
                                    <th scope="col">Nazwa</th>
                                    <th scope="col">Ile</th>
                                    <th scope="col">Category</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($expenses as $expense)
                                    <tr>
                                        <td>{{ $expense->date }}</td>
                                        <td>{{ $expense->name }}</td>
                                        <td>{{ $expense->amount }}</td>
                                        <td>{{ $expense->category }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-md-2">
                <div class="card-body bg-light mb-5">
                    Planowe wydatki
                </div>
            </div>
        </div>
    </div>
</div>
@endsection