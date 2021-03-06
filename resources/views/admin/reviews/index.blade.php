@extends('layouts.admin')
@section('title', 'Отзывы')
@section('add_button', route('admin.reviews.create'))
@section('content')
<div class="w-100">
    <div class="box">
        <table class="table">
            <tbody>
                @foreach($reviews as $review)
                    <tr>
                        <td>
                            Отзыв #{{ $review->id }}
                        </td>
                        <td class="text-end">
                            <a href="{{ route('admin.reviews.edit', ['id' => $review->id]) }}" class="btn btn-sm btn-outline-primary">Правка</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection