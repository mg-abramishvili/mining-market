@extends('layouts.admin')
@section('title', 'Товары')
@section('add_button', route('admin.products.create'))
@section('content')
<div class="w-100">
    <div class="box">
        <table class="table">
            <tbody>
                @foreach($products as $product)
                    <tr>
                        <td>
                            {{ $product->name }} ({{ $product->gpu_amount }})
                        </td>
                        <td class="text-end">
                            <a href="{{ route('admin.products.edit', ['id' => $product->id]) }}" class="btn btn-sm btn-outline-primary">Правка</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection