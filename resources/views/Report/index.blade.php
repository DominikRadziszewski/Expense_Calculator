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
    <div class="row align-items-start" style="text-align: center;">
      
        <div class="col h2">
            @php 
                use App\Helpers\MonthHelper;
                echo MonthHelper::getMonthName($month);
            @endphp
        </div>
        <div class="col">
            <a href="{{ route('nextmonth.index', [$month]) }}">Powrót</a>
        </div>
    </div>
    <div class="card">
        <div class="row justify-content-center">
            <div class="card-body mb-5">
                <chart-component :labels="{{ json_encode($income_labels) }}" :values="{{ json_encode($income_values) }}"></chart-component>
            </div>
            <div class="card-body mb-5">
                <chart-component :labels="{{ json_encode($expenses_labels) }}" :values="{{ json_encode($expenses_values) }}"></chart-component>
            </div>
        </div>
    </div>
</div>
<div class="ml-4 text-center text-sm text-gray-500 dark:text-gray-400 sm:text-right sm:ml-0">
    Laravel v{{ Illuminate\Foundation\Application::VERSION }} (PHP v{{ PHP_VERSION }})
</div>
@endsection

@push('scripts')
<script src="{{ mix('js/app.js') }}"></script>
@endpush
