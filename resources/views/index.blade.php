<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>To-Do List</title>
  <link rel="stylesheet" href="{{ asset('css/style.css') }}">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

</head>
<body>

  <div class="list-container">
    <h2>📝 To-Do List</h2>

    <form action="{{ isset($task) ? route('updatesTask', $task->id) : route('addTask') }}" method="post">
      @csrf
      @if(isset($task))
        @method('PUT')
      @endif
      <input type="text" id="task-input" name="task_name" value="{{ $task->task_name ?? '' }}" placeholder="Enter task name" required>
      <input type="date" id="due-date" name="due_date" value="{{ $task->due_date ?? '' }}" required>
      <input type="submit" value="{{ isset($task) ? 'Edit Task' : 'Add Task' }}"></input>
    </form>

    <ul id="task-list">
      @foreach ($tasks as $id => $task)
        <li class="task-item {{ $task->is_completed ? 'completed' : ($task->is_in_progress ? 'in-progress' : ($task->is_pending ? 'pending' : '')) }}">
        <div class="task-header">
          <span class="task-title {{ $task->is_completed ? 'completed' : '' }}">{{ $task->task_name }}</span>
          <span title="Edit"><a href="{{ route('getTaskDetails', ['id' => $task->id, 'page' => request('page')]) }}"><i class="fa-solid fa-pencil"></i></a></span>
          <span class="due-date" title="Due Date"><i class="fa-regular fa-hourglass"></i> {{ $task->due_date }}</span>
        </div>
        @if ($task->is_completed)
          <span class="status completed-status" title="Status">Completed</span>
        @elseif ($task->is_in_progress)
          <span class="status in-progress" title="Status">In Progress</span>
        @elseif ($task->is_pending)
          <span class="status pending" title="Status">Pending</span>
        @endif
        
        <div class="actions">
          <a href="{{ route('update.status', ['action' => 'pending', 'id' => $task->id, 'page' => request('page')]) }}" class="pending-btn"><i class="fa-solid fa-clock"></i> Pending</a>
          <a href="{{ route('update.status', ['action' => 'progress', 'id' => $task->id, 'page' => request('page')]) }}" class="in-progress-btn"><i class="fa-solid fa-gear"></i> In Progress</a>
          <a href="{{ route('update.status', ['action' => 'complete', 'id' => $task->id, 'page' => request('page')]) }}" class="completed-btn"><i class="fa-solid fa-check"></i> Completed</a>
          <a href="{{ route('update.status', ['action' => 'delete', 'id' => $task->id, 'page' => request('page')]) }}" class="delete-btn"><i class="fa-solid fa-trash"></i> Delete</a>
        </div>
      </li>
      @endforeach
    </ul>
    {{ $tasks->links() }}
  </div>
  {{-- This will only use Bootstrap's pagination --}}
  <div class="mt-4">
</div>



</body>
</html>
