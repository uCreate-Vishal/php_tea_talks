@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Add book</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif


                    <div class="row">
                        <div class="col-sm-12">
                            <div class="row">
                                @if($errors->any())
                                <div class="alert alert-danger">
                                    @foreach($errors->all() as $error)
                                    <p>{{ $error }}</p>
                                    @endforeach
                                </div>
                                @endif
                            </div>
                            {!! Form::open([
                            'route' => 'books.store'
                            ]) !!}

                            <div class="form-group">
                                {!! Form::label('Name', 'Name:', ['class' => 'control-label']) !!}
                                {!! Form::text('name', null, ['class' => 'form-control']) !!}
                            </div>
                            <div class="form-group">
                                {!! Form::label('published_at', 'Publish date:', ['class' => 'control-label']) !!}
                                {!! Form::text('published_at', null, ['class' => 'form-control', 'placeholder'=>'1970-01-01 00:00:00']) !!}
                                </div>

                            <div class="form-group">
                                {!! Form::label('remarks', 'Remarks:', ['class' => 'control-label']) !!}
                                {!! Form::textarea('remarks', null, ['class' => 'form-control']) !!}
                            </div>

                            {!! Form::submit('Add New Book', ['class' => 'btn btn-primary']) !!}

                            {!! Form::close() !!} 
                        </div>  
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



@endsection
