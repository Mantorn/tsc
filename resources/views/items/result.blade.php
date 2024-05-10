@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Item search result</div>
                    {{$errors}}
                    @if($errors->any())
                        <div class="row d-flex text-center">
                            <ul>
                            {{ implode('', $errors->all('<li>:message</li>')) }}
                            </ul>
                        </div>   
                    @endif
                    <div class="row d-flex mb-3 text-center">
                        <a class="col-6" href="{{route('items.one.find', $item->id-1)}}">PREV</a>
                        <a class="col-6" href="{{route('items.one.find', $item->id+1)}}">NEXT</a>
                    </div>
                    <div class="row d-flex text-center">
                        <p>{{$item->name}} - {{$item->producer}} : {{$result[$item->unit]}}{{$item->unit}}</p>
                    </div>    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
