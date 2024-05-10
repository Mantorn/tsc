@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Item search result</div>
                    <div class="row d-flex mb-3 text-center">
                        <a href="{{route('items.one.show')}}" class="col-12">BACK</a>
                        <!-- <a class="col-6" href="{{route('items.one.find', $item->id-1)}}">PREV</a>
                        <a class="col-6" href="{{route('items.one.find', $item->id+1)}}">NEXT</a> -->
                    </div>
                    <div class="row d-flex text-center">
                        <p>{{$item->name}} - {{$item->producer}} : 
                            @foreach($result as $unit => $count)
                            <br>{{$count}} {{$unit}}
                            @endforeach</p>
                    </div>    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
