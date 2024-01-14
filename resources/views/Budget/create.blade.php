@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header" style="text-align: center;">Dodaj Przychód lub Wydatek</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('budget.store')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="row mb-3">
                            <label for="type" class="col-md-4 col-form-label text-md-end">Typ transakcji</label>
                            <div class="col-md-6">
                                <select name="type" id="type" class="form-control" required onchange="updateCategoryOptions()">
                                    <option value="income">Przychód</option>
                                    <option value="expense">Wydatek</option>
                                </select>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="category" class="col-md-4 col-form-label text-md-end">Kategoria</label>
                            <div class="col-md-6">
                                <select name="category" id="category" class="form-control" required>
                                </select>
                            </div>
                        </div>
                       
                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">Nazwa</label>
                            <div class="col-md-6">
                                <input id="name" type="text" maxlength="500" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="row mb-3">
                            <label for="amount" class="col-md-4 col-form-label text-md-end">Ile</label>
                            <div class="col-md-6">
                                <input id="amount" type="number" min="0" class="form-control @error('amount') is-invalid @enderror" name="amount" value="{{ old('amount') }}" required autocomplete="amount" autofocus>
                                @error('amount')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        
                   

                        

                        <div class="row mb-3">
                            <label for="date" class="col-md-4 col-form-label text-md-end">Data</label>
                            <div class="col-md-6">
                                <input id="date" type="date" class="form-control @error('date') is-invalid @enderror" name="date" value="{{ old('date') }}" required autocomplete="date">
                                @error('date')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Zapisz
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
<script>
    function updateCategoryOptions() {
        var selectedType = document.getElementById("type").value;
        var categoryDropdown = document.getElementById("category");

        categoryDropdown.innerHTML = '';

        var categories = (selectedType === 'income') ? {!! json_encode(\App\Enums\IncomeCategory::IncomeCategory) !!} : {!! json_encode(\App\Enums\ExpensesCategory::ExpensesCategory) !!};

        categories.forEach(function(category) {
            var option = document.createElement("option");
            option.value = category;
            option.text = category;
            categoryDropdown.add(option);
        });
    }
</script>
                       