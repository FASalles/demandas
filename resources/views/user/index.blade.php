@extends('layouts.pdf')
@section('title')
@endsection

<div style="background-color: #f44336;">
    <table style="width: 100%; border-collapse: collapse;">
        <thead>
        <tr style="background-color: #6495ED;">
            <th style="padding: 8px 16px; border: 1px solid #ccc; width: 20%;">NOME</th>
            <th style="padding: 8px 16px; border: 1px solid #ccc; width: 20%;">EMAIL</th>
            <th style="padding: 8px 16px; border: 1px solid #ccc; width: 20%;">ROLE</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($users as $user)
            <tr style="background-color: #fff;">
                <td style="padding: 8px 16px; border: 1px solid #ccc; width: 20%;">{{ $user->name }}</td>
                <td style="padding: 8px 16px; border: 1px solid #ccc; width: 20%;">{{ $user->email }}</td>
                <td style="padding: 8px 16px; border: 1px solid #ccc; width: 20%;">{{ $user->getRoles() }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
