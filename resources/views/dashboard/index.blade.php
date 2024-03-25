@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Bem vindo de volta, {{ auth()->user()->name }}</h1>
</div>
<div class="fs-5">
<h4 class="mb-3"> Perfil </h4>
<p>
        &emsp;Nome&emsp;&emsp;: {{ auth()->user()->name }} <br>
        &emsp;Username : {{ auth()->user()->username }} <br>
        &emsp;Email&emsp;&emsp;: {{ auth()->user()->email }} <br>
</p>
</div>
@endsection