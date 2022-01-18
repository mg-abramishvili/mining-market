@extends('layouts.admin')
@section('title', 'Настройки')
@section('content')
<div class="w-100">
    <review-edit :review_id="{{ $review->id }}"></review-edit>
</div>
@endsection