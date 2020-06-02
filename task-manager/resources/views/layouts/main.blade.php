<!doctype html>

<html lang="{{config('app.locale')}}">
<head>
    <meta charset="utf-8">
    <title>{{config('app.name', 'Task Manager')}}</title>
    <meta name="author" content="Michał Pawlicki">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/app.css') }}">
</head>

<body>
<div class="container">
    <div id="main-row" class="row align-items-center">
        <div class="row align-items-start" style="width: 100%">
            <div class="col-sm-4">
                @yield('task-entry')
            </div>
            <div class="col-sm-8">
                @yield('task-view')
            </div>
        </div>
    </div>
</div>
<script src="{{ asset('js/app.js') }}"></script>

</body>
</html>
