@extends('layouts.pdf')
@section('title')
@endsection

<div style="background-color: #f44336;">
    <table style="width: 100%; border-collapse: collapse;">
        <thead>
        <tr style="background-color: #6495ED;">
            <th style="padding: 8px 16px; border: 1px solid #ccc; width: 20%;">NOME DO SETOR</th>
            <th style="padding: 8px 16px; border: 1px solid #ccc; width: 20%;">USUÁRIO RESPONSÁVEL</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($sectors as $sector)
            <tr style="background-color: #fff;">
                <td style="padding: 8px 16px; border: 1px solid #ccc; width: 20%;">{{ $sector->name }}</td>
                <td style="padding: 8px 16px; border: 1px solid #ccc; width: 20%;">{{ $sector->user }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
