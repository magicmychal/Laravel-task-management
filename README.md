# Laravel-task-management
A simple tool in laravel to present basic Laravel skills
Although it became a focus on JavaScript

## What works
- add new task (title, priority, project) - dynamically update the list 
- add new project (project name)
- display tasks (select project)
- drag tasks
- remove task
- CSRF tokens

## What doesn't work 
- sort by priority (currently not in use)
- edit task


## How to run the app
### Requirements 
- PHP
- MySQL,
- Composer,
- npm 

### Instructions
1. Go to .env file
2. Change DB_CONNECTION settings to the database you run.
3. Open Terminal in the folder
4. Run ``` npm insall ```
5. Run ``` php artisan migrate ```
6. Run ``` php artisan serve ``` and open project in the browser
