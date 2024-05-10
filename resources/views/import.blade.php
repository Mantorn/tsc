@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Import') }}</div>

                <div class="card-body">
                <form action="{{ route('import.save') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="file" name="file" accept=".csv">
                    <button type="submit">Import CSV</button>
                </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
