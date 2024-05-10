@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>
                        @if($errors->any())
                            <div class="row d-flex text-center">
                                <ul>
                                {{ implode('', $errors->all('<li>:message</li>')) }}
                                </ul>
                            </div>   
                        @endif
                        @foreach($items as $item)
                            <a href="{{route('items.one.find', $item->id)}}">{{$item->producer}} - {{$item->name}}</a><br>
                        @endforeach
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
