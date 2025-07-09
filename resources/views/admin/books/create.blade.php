@extends('layouts.app')
@section('title','Add Book')
@section('content')
<h1 class="text-2xl mb-4">Add Book</h1>
<form action="{{ route('admin.books.store') }}" method="POST">
    @include('admin.books._form', ['button'=>'Save','book'=>$book])
</form>
@endsection