@extends('layouts.app')

@section('title', $title)

@section('content')
    <h2>Daftar Pengguna Sistem</h2>
    
    <table border="1" cellpadding="10" cellspacing="0">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>Email</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
                <tr>
                    <td>{{ $user['id'] }}</td>
                    <td>{{ sanitize($user['nama']) }}</td> <!-- Menggunakan helper global -->
                    <td>{{ $user['email'] }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection