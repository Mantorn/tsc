@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>
                        @foreach($items as $item)
                            <a href="{{route('items.one.find', $item->id)}}">{{$item->producer}} - {{$item->name}}</a><br>
                        @endforeach
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
