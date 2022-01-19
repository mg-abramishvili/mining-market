@extends('layouts.admin')
@section('title', 'Схема #' . $scheme->id)
@section('content')
<div class="w-100">
    <scheme-edit :scheme_id="{{ $scheme->id }}"></scheme-edit>
</div>
@endsection