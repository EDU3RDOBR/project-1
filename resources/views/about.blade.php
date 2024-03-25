<!DOCTYPE html>
<html lang="pt">
@extends('layouts.main')

@section('container')
  <h1>Página Sobre</h1>
  <h3>{{ $name }}</h3>
  <p>{{ $email }}</p>
  <img src="img/{{ $image }}" alt="{{ $name }}" width="200" class="img-thumbnail rounded-circle">
@endsection
