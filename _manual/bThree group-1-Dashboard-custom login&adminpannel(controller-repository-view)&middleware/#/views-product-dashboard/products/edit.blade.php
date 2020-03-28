@extends('back.autos.template')

@section('form-open')
    <form method="post" action="{{ route('autos.update', [$auto->id]) }}">
                     {{ csrf_field() }}
                  {{ method_field('PUT') }}   
@endsection
