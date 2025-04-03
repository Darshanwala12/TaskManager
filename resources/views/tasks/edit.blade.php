@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2>Edit Task</h2>
    <div class="card p-4">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('tasks.update', $task->id) }}">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label class="form-label">Title</label>
                <input type="text" name="title" class="form-control" value="{{ old('title', $task->title) }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Description</label>
                <textarea name="description" class="form-control">{{ old('description', $task->description) }}</textarea>
            </div>
            <div class="mb-3">
                <label class="form-label">Status</label>
                <select name="status" class="form-select">
                    <option value="pending" {{ $task->status == 'pending' ? 'selected' : '' }}>Pending</option>
                    <option value="in progress" {{ $task->status == 'in progress' ? 'selected' : '' }}>In Progress</option>
                    <option value="completed" {{ $task->status == 'completed' ? 'selected' : '' }}>Completed</option>
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label">Due Date</label>
                <input type="date" name="due_date" class="form-control" value="{{ old('due_date', $task->due_date) }}">
            </div>
            <div class="d-flex justify-content-between">
                <a href="{{ route('tasks.index') }}" class="btn btn-secondary">Back</a>
                <button type="submit" class="btn btn-success">Update Task</button>
            </div>
        </form>
    </div>
</div>
@endsection