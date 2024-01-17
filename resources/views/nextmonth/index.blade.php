@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-1">
            <div>
                <img src="{{ asset('storage/Logo.png') }}" alt="Logo" width="110px" height="120px">
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row align-items-start" style="text-align: center;">
            <div class="col">
                <button id="previousMonthButton" onclick="window.location.href='{{ route('nextmonth.index', ['month' => sprintf('%02d', max(1, $month - 1))]) }}'">
                    Poprzedni Miesiąc
                </button>
            </div>
            <div class="col h2">
                @php 
                    use App\Helpers\MonthHelper;
                    echo MonthHelper::getMonthName($month);
                @endphp
            </div>
            <div class="col">
                <button id="nextMonthButton" onclick="window.location.href='{{ route('nextmonth.index', ['month' => sprintf('%02d', min(12, $month + 1))]) }}'                    ">
                    Następny Miesiąc ->
                </button>
            </div> 
        </div>
    </div>
    
    <div class="card">
        <div class="row justify-content-center">
            <div class="col-md-2">
                <div class="card-body bg-light mb-3">
                    Łączny Przychód
                    <table class="table table-hover">
                        <tbody>
                            <tr>
                                <td>{{$general_income}}</td>
                            </tr>
                        </tbody>
                    </table>
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
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                              @foreach ($incomes as $income)
                            
                                <tr>
                                    <td>{{ $income->date }}</td>
                                    <td>{{ $income->name }}</td>
                                    <td>{{ $income->amount }}</td>
                                    <td>{{ $income->category }}</td>
                                    <td>
                                        <form action="{{ route('budget.destroy', ['id' => $income->id]) }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <input type="hidden" name="value" value="1">
                                            <button class="delete" type="submit">Delete</button>
                                        </form>
                                    </td>
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
                    <table class="table table-hover">
                        <tbody>
                            <tr>
                                <td>{{$general_income - $general_expenses }}</td>
                            </tr>
                        </tbody>
                    </table>
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
                                @if(month('m', strtotime($month)) == month('m', strtotime($expense->month)))
                                <tr>
                                    <td>{{ $expense->month }}</td>
                                    <td>{{ $expense->name }}</td>
                                    <td>{{ $expense->amount }}</td>
                                    <td>{{ $expense->category }}</td>
                                    <td>
                                        <form action="{{ route('budget.destroy', ['id' => $expense->id]) }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <input type="hidden" name="value" value="2">
                                            <button class="delete" type="submit">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                                @endif
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-md-2">
                <div class="card-body bg-light mb-5">
                    Łączne wydatki
                    <table class="table table-hover">
                        <tbody>
                            <tr>
                                <td>{{$general_expenses}}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col text-right">
                <a href="{{ route('report.index', [$month]) }}" class="btn btn-primary">Raport</a>
            </div> 
          
        </div>
    </div>
</div>
@endsection
