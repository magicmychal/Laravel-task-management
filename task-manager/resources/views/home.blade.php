@extends('layouts.main')

@section('task-entry')
    <h2>Add new task</h2>
    <form action="">
        <div class="form-group">
            <label for="task-title">Task title</label>
            <input type="text" class="form-control" id="task-title" placeholder="type... &quot;Hire new PHP Developer&quot;">
        </div>
        <div class="form-group">
            <label for="priority-number">Priority</label>
            <input id="priority-number" type="number" class="form-control" value="0" min="0" max="1000" step="5"/>
        </div>
        <div class="form-group">
            <label for="project-select">Project</label>
            <select id="project-select" class="custom-select" required>
                <option value="">Click to select the project</option>
                <!-- TODO: Fetch projects -->
                <option value="1">Project 1</option>
                <option value="2">Two</option>
                <option value="3">Three</option>
            </select>
        </div>
        <button type="submit" class="btn btn-outline-success" style="width: 100%">Add new task</button>
    </form>

@endsection

@section('task-view')
    <h2>Task list</h2>

    <div class="card" style="width: 18rem;">
        <ul class="list-group list-group-flush">
            <li class="list-group-item">Cras justo odio</li>
            <li class="list-group-item">Dapibus ac facilisis in</li>
            <li class="list-group-item">Vestibulum at eros</li>
        </ul>
    </div>
@endsection
