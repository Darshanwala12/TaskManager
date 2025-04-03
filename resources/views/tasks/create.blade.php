@extends('layouts.app')
@section('content')
<div class="container mt-4">
    <h2>Create Task</h2>
    <div class="card p-4">
        <form method="POST" action="{{ route('tasks.store') }}">
            @csrf
            <div class="mb-3">
                <label class="form-label">Title</label>
                <input type="text" name="title" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Description</label>
                <textarea name="description" class="form-control"></textarea>
            </div>
            <div class="mb-3">
                <label class="form-label">Status</label>
                <select name="status" class="form-select">
                    <option value="pending">Pending</option>
                    <option value="in progress">In Progress</option>
                    <option value="completed">Completed</option>
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label">Due Date</label>
                <input type="date" name="due_date" class="form-control">
            </div>
            <div class="d-flex justify-content-between">
                <a href="{{ route('tasks.index') }}" class="btn btn-secondary">Back</a>
                <button type="submit" class="btn btn-primary">Create</button>
            </div>
        </form>
    </div>
</div>
@endsection