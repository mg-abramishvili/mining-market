@extends('layouts.admin')
@section('title', 'Отзыв #' . $review->id)
@section('content')
<div class="w-100">
    <review-edit :review_id="{{ $review->id }}"></review-edit>
</div>
@endsection