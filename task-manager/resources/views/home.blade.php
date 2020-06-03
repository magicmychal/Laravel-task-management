@extends('layouts.main')

@section('task-entry')
    <h2>Add new task</h2>
    <form action="">
        <div class="form-group">
            <label for="task-title">Task title</label>
            <input type="text" class="form-control" id="task-title"
                   placeholder="type... &quot;Hire new PHP Developer&quot;">
        </div>
        <div class="form-group">
            <label for="priority-number">Priority</label>
            <input id="priority-number" type="number" class="form-control" value="0" min="0" max="1000" step="5"/>
        </div>
        <div class="form-group">
            <label for="project-select">Project</label>
            <select id="project-select" class="custom-select" required>
                <!-- TODO: Fetch projects -->
                @if(count($projects) >= 1)
                    @foreach($projects as $project)
                        <option value="{{$project->projectId}}">{{$project->projectName}}</option>
                    @endforeach
                @else
                    <option value="">--- NO PROJECTS ADDED ---</option>
                @endif
            </select>
        </div>
        <button type="submit" class="btn btn-outline-success" style="width: 100%">Add new task</button>
    </form>
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
                    <option value="{{$project->projectId}}">{{$project->projectName}}</option>
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
