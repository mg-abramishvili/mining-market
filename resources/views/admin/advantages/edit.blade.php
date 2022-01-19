@extends('layouts.admin')
@section('title', 'Преимущество #' . $advantage->id)
@section('content')
<div class="w-100">
    <advantage-edit :advantage_id="{{ $advantage->id }}"></advantage-edit>
</div>
@endsection