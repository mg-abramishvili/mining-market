@extends('layouts.admin')
@section('title', 'Преимущества')
@section('content')
<div class="w-100">
    <div class="box">
        <table class="table">
            <tbody>
                @foreach($advantages as $advantage)
                    <tr>
                        <td>
                            {{ $advantage->text }}
                        </td>
                        <td class="text-end">
                            <a href="{{ route('admin.advantages.edit', ['id' => $advantage->id]) }}" class="btn btn-sm btn-outline-primary">Правка</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection