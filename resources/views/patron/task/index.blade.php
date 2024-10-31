<x-app-layout>
    <div class="py-12">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
            <!-- Page Heading -->
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">Tasks</h1>
                <button class="btn btn-sm btn-primary shadow-sm" data-toggle="modal" data-target="#taskModal" 
                        onclick="openCreateModal()">Create New Task</button>
            </div>
            
            <!-- Tasks Table -->
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Title</th>
                        <th scope="col">Description</th>
                        <th scope="col">Priority</th>
                        <th scope="col">Status</th>
                        <th scope="col">Due Date</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($tasks as $task)
                        <tr>
                            <td>{{ $task->title }}</td>
                            <td>{{ $task->description }}</td>
                            <td>{{ $task->priority }}</td>
                            <td>{{ $task->status }}</td>
                            <td>{{ \Carbon\Carbon::parse($task->due_date)->format('d M Y') }}</td>
                            <td>
                                <button class="btn btn-primary" data-toggle="modal" data-target="#taskModal" 
                                        onclick="openEditModal({{ $task }})">Edit</button>
                                <a href="{{ route('tasks.delete', $task->task_id) }}" class="btn btn-danger"
                                   onclick="return confirm('Are you sure you want to delete this task?')">Delete</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- Task Modal for Create/Edit -->
    <div class="modal fade" id="taskModal" tabindex="-1" role="dialog" aria-labelledby="taskModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="taskModalLabel">Create a New Task</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="taskForm" method="POST">
                    @csrf
                    <div id="methodField"></div> <!-- for dynamically adding PUT method -->
                    <div class="modal-body">
                        <!-- Title Field -->
                        <div class="form-group mb-3">
                            <label for="title">Title</label>
                            <input type="text" class="form-control" id="title" name="title" placeholder="Task Title" required>
                        </div>
                        <!-- Description Field -->
                        <div class="form-group mb-3">
                            <label for="description">Description</label>
                            <textarea class="form-control" id="description" name="description" placeholder="Task Description" rows="3"></textarea>
                        </div>
                        <!-- Research Assistant Selection -->
                        <div class="form-group mb-3">
                            <label for="assigned_research_assistant_id">Assign to</label>
                            <select class="form-control" id="assigned_research_assistant_id" name="assigned_research_assistant_id">
                                <option value="">Select a Research Assistant</option>
                                @foreach($researchAssistants as $assistant)
                                    <option value="{{ $assistant->id }}">{{ $assistant->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <!-- Priority Field -->
                        <div class="form-group mb-3">
                            <label for="priority">Priority</label>
                            <select class="form-control" id="priority" name="priority">
                                <option value="low">Low</option>
                                <option value="medium">Medium</option>
                                <option value="high">High</option>
                            </select>
                        </div>
                        <!-- Status Field -->
                        <div class="form-group mb-3">
                            <label for="status">Status</label>
                            <select class="form-control" id="status" name="status">
                                <option value="pending">Pending</option>
                                <option value="in_progress">In Progress</option>
                                <option value="completed">Completed</option>
                            </select>
                        </div>
                        <!-- Due Date Field -->
                        <div class="form-group mb-3">
                            <label for="due_date">Due Date</label>
                            <input type="date" class="form-control" id="due_date" name="due_date">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary" id="submitButton">Save Task</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- JavaScript for Modal Functionality -->
    <script>
        function openCreateModal() {
            // Set form action to create route and clear fields
            document.getElementById('taskForm').action = "{{ route('tasks.store') }}";
            document.getElementById('methodField').innerHTML = '';
            document.getElementById('taskModalLabel').textContent = 'Create a New Task';
            document.getElementById('submitButton').textContent = 'Create Task';
            clearFormFields();
        }

        function openEditModal(task) {
            // Set form action to update route with task ID
            document.getElementById('taskForm').action = `/tasks/update/${task.task_id}`;
            document.getElementById('methodField').innerHTML = '@method("POST")';
            document.getElementById('taskModalLabel').textContent = 'Edit Task';
            document.getElementById('submitButton').textContent = 'Update Task';

            // Populate form fields with task data
            document.getElementById('title').value = task.title;
            document.getElementById('description').value = task.description;
            document.getElementById('assigned_research_assistant_id').value = task.assigned_research_assistant_id;
            document.getElementById('priority').value = task.priority;
            document.getElementById('status').value = task.status;
            document.getElementById('due_date').value = task.due_date;
        }

        function clearFormFields() {
            document.getElementById('title').value = '';
            document.getElementById('description').value = '';
            document.getElementById('assigned_research_assistant_id').value = '';
            document.getElementById('priority').value = 'low';
            document.getElementById('status').value = 'pending';
            document.getElementById('due_date').value = '';
        }
    </script>
</x-app-layout>
