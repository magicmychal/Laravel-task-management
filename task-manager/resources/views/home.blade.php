@extends('layouts.main')

@section('task-entry')
    <h2>Add new task</h2>
    <form id="addNewTaskForm">
        <div class="form-group">
            <label for="task-title">Task title</label>
            <input type="text" class="form-control" id="task-title"
                   placeholder="type... &quot;Hire new PHP Developer&quot;" required>
        </div>
        <div class="form-group">
            <label for="priority-number">Priority</label>
            <input id="priority-number" type="number" class="form-control" value="0" min="0" max="1000" step="5" required/>
        </div>
        <div class="form-group">
            <label for="project-select">Project</label>
            <select id="project-select" class="custom-select" required>
                <!-- TODO: Fetch projects -->
                @if(count($projects) >= 1)
                    @foreach($projects as $project)
                        <option value="{{$project->id}}">{{$project->projectName}}</option>
                    @endforeach
                @else
                    <option value="">--- NO PROJECTS ADDED ---</option>
                @endif
            </select>
        </div>
        <button id="add-new-task-button" class="btn btn-outline-success" style="width: 100%">Add new task</button>
    </form>
    <div id="add-new-task-success-alert" class="alert alert-success alert-dismissible fade" role="alert" style="margin-top: 10px">
        <strong>Way to go!</strong> You added a new task
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <hr>
    <h2>Add new project</h2>
    <form>
        <div class="form-group">
            <lebel for="project-name">Project name</lebel>
            <input type="text" id="project-name" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-outline-success" style="width: 100%">Add new task</button>
    </form>

@endsection

@section('task-view')
    <h2>Task list</h2>
    <div class="form-group">
        <label for="project-select">Project</label>
        <select id="project-select" class="custom-select" required>
            <!-- TODO: Fetch projects -->
            @if(count($projects) >= 1)
                @foreach($projects as $project)
                    <option value="{{$project->project_id}}">{{$project->projectName}}</option>
                @endforeach
            @else
                <option value="">--- NO PROJECTS ADDED ---</option>
            @endif
        </select>
    </div>
    <div class="card">
        <ul class="list-group list-group-flush">
            <li class="list-group-item">Cras justo odio</li>
            <li class="list-group-item">Dapibus ac facilisis in</li>
            <li class="list-group-item">Vestibulum at eros</li>
        </ul>
    </div>
@endsection
