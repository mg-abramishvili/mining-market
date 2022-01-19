@extends('layouts.admin')
@section('title', 'Как мы работаем')
@section('content')
<div class="w-100">
    <div class="box">
        <table class="table">
            <tbody>
                @foreach($schemes as $scheme)
                    <tr>
                        <td>
                            {{ $scheme->name }}
                        </td>
                        <td class="text-end">
                            <a href="{{ route('admin.schemes.edit', ['id' => $scheme->id]) }}" class="btn btn-sm btn-outline-primary">Правка</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection