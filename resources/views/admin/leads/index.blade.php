@extends('layouts.admin')
@section('title', 'Заявки')
@section('content')
<div class="w-100">
    <div class="box">
        <table class="table">
            <tbody>
                @foreach($leads as $lead)
                    <tr>
                        <td>
                            {{ $lead->created_at }}
                        </td>
                        <td>
                            {{ $lead->name }}
                            <br>{{ $lead->tel }}
                        </td>
                        <td class="text-end">
                            <a href="{{ route('admin.leads.show', ['id' => $lead->id]) }}" class="btn btn-sm btn-outline-primary">Посмотреть</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection