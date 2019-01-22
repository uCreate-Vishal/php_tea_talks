@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    <div class="row">
                        <div class="col-sm-12">
                            <div class="row">
                                <div class="col-md-2">
                                    <h4>My books</h4> 
                                </div>
                                <div class="col-md-10 ">
                                    <a href="{{url('/books/create')}}">Add new book</a>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3">
                                    <h5>Name</h5>
                                </div>
                                <div class="col-md-3">
                                    <h5>Published</h5>
                                </div>
                                <div class="col-md-3">
                                    <h5>Remarks</h5>
                                </div>
                            </div>
                           
                            @foreach($books as $book)
                            <div class="row">
                                <div class="col-md-3">
                                    <p>{{$book->name}}</p>
                                </div>
                           
                                <div class="col-md-3">
                                    @php
                                        $date = new DateTime($book->published_at);
                                        $date->setTimezone(new DateTimeZone($time_zone));
                                    @endphp
                                    @if($book->published_at)
                                    <p>{{$date->format('d-m-Y H:i:s')}}</p>
                                    @endif
                                </div>
                                <div class="col-md-4">
                                    <p>{{ $book->remarks}}</p>
                                </div>                                
                            </div>
                            @endforeach
                            
                        </div>  
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



@endsection
