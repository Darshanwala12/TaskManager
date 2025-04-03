@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center">
        <h2>Task List</h2>
        <div>
            <a href="{{ route('tasks.create') }}" class="btn btn-primary">Create Task</a>
            <form action="{{ route('logout') }}" method="POST" style="display:inline;">
                @csrf
                <button type="submit" class="btn btn-danger">Logout</button>
            </form>
        </div>
    </div>

    <form method="GET" action="{{ route('tasks.index') }}" class="mt-3">
        <select name="status" onchange="this.form.submit()" class="form-select">
            <option value="">All</option>
            <option value="pending" {{ request('status') == 'pending' ? 'selected' : '' }}>Pending</option>
            <option value="in progress" {{ request('status') == 'in progress' ? 'selected' : '' }}>In Progress</option>
            <option value="completed" {{ request('status') == 'completed' ? 'selected' : '' }}>Completed</option>
        </select>
    </form>

    <table class="table mt-3">
        <tr>
            <th>Title</th>
            <th>Status</th>
            <th>Due Date</th>
            <th>Actions</th>
        </tr>
        @foreach($tasks as $task)
        <tr>
            <td>{{ $task->title }}</td>
            <td>{{ $task->status }}</td>
            <td>{{ $task->due_date }}</td>
            <td>
                <a href="{{ route('tasks.edit', $task->id) }}" class="btn btn-warning btn-sm">Edit</a>
                <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>

    <div class="mt-3">
        {{ $tasks->links() }} <!-- Pagination Links -->
    </div>
</div>
@endsection
