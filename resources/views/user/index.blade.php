@extends('app')
@section('content')
{{--  @dd($users)  --}}
    <div class="d-flex justify-content-end my-2">
        <a href="{{ route('user.create') }}" class="btn btn-primary">Add</a>
    </div>
    <table class="table table-bordered">
        <tr>
            <th>No.</th>
            <th>Username</th>
            <th>Email</th>
            <th>Actions</th>
        </tr>
        @foreach ( $users as  $i => $user )
        <tr>
            <td>{{ $i + 1 }}</td>
            <td>{{ $user->name}}</td>
            <td>{{ $user->email }}</td>
            <td>
                <a href="{{ route('user.edit', $user->id) }}" class="btn btn-warning btn-sm">Edit</a>
                <form action="{{ route('user.destroy', $user->id) }}" method="post" onsubmit="return confirm('R u sure wanna delete it')" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
@endsection
