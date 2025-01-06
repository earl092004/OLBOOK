@extends('components.layouts')

@section('content')
<div class="container mt-5">
    <h1 class="text-center">Admin Users</h1>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Subscription</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($admins as $admin)
            <tr>
                <td>{{ $admin->name }}</td>
                <td>{{ $admin->email }}</td>
                <td>{{ ucfirst($admin->subscription_type) }}</td>
                <td>
                    <a href="{{ route('admin_users.edit', $admin->id) }}" class="btn btn-warning">Edit</a>
                    <form action="{{ route('admin_users.destroy', $admin->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
