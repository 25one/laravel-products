@extends('back.autos.template')

@section('form-open')
    <form method="post" action="{{ route('autos.store') }}">
                    {{ csrf_field() }}
                {{ method_field('POST') }}   
@endsection