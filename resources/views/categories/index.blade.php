@extends('app')
@section('content')
@section('title', 'Data Categories')
    {{--  @dd($users)  --}}
    <div class="d-flex justify-content-end my-2">
        <a href="{{ route('category.create') }}" class="btn btn-primary">Add Category</a>
    </div>
    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Name</th>
            <th>Actions</th>
        </tr>
        @foreach ($datas as $i => $data)
            <tr>
                <td>{{ $i + 1 }}</td>
                <td>{{ $data->category_name }}</td>
                <td>
                    <a href="{{ route('category.edit', $data->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('category.destroy', $data->id) }}" method="post"
                        onsubmit="return confirm('R u sure wanna delete it')" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
@endsection
