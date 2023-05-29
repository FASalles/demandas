@extends('layouts.pdf')
@section('title')
@endsection

<div style="background-color: #f44336;">
    <table style="width: 100%; border-collapse: collapse;">
        <thead>
        <tr style="background-color: #6495ED;">
            <th style="padding: 8px 16px; border: 1px solid #ccc; width: 20%;">NOME DO SISTEMA</th>
            <th style="padding: 8px 16px; border: 1px solid #ccc; width: 20%;">DESENVOLVEDOR RESPONSÁVEL</th>
            <th style="padding: 8px 16px; border: 1px solid #ccc; width: 10%;">USUÁRIO RESPONSÁVEL</th>
            <th style="padding: 8px 16px; border: 1px solid #ccc; width: 20%;">VERSÃO LARAVEL E PHP</th>
            <th style="padding: 8px 16px; border: 1px solid #ccc; width: 30%;">OUTRAS TECNOLOGIAS</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($systems as $system)
            <tr style="background-color: #fff;">
                <td style="padding: 8px 16px; border: 1px solid #ccc; width: 20%;">{{ $system->name }}</td>
                <td style="padding: 8px 16px; border: 1px solid #ccc; width: 20%;">{{ $system->developer }}</td>
                <td style="padding: 8px 16px; border: 1px solid #ccc; width: 10%;">{{ $system->user }}</td>
                <td style="padding: 8px 16px; border: 1px solid #ccc; width: 20%;">{{ $system->laravelVersion }}</td>
                <td style="padding: 8px 16px; border: 1px solid #ccc; width: 30%;">{{ $system->otherTecs }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>

</div>







