<!DOCTYPE html>
<html>
<head>
    <title>Employees List</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">
    <div class="card shadow">
        <div class="card-header bg-dark text-white">
            <h4 class="mb-0">Employees List</h4>
        </div>

        <div class="card-body">
            <table class="table table-bordered table-hover text-center">
                <thead class="table-primary">
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Age</th>
                        <th>Phone</th>
                        <th>Address</th>
                        <th width="180">Action</th>
                    </tr>
                </thead>

                <tbody>
                @foreach($employees as $emp)
                    <tr>
                        <td>{{ $emp->id }}</td>
                        <td>{{ $emp->name }}</td>
                        <td>{{ $emp->age }}</td>
                        <td>{{ $emp->phone }}</td>
                        <td>{{ $emp->address }}</td>
                        <td>
                            <a href="{{ url('admin/employee-edit/'.$emp->id) }}" class="btn btn-sm btn-warning">
                                Edit
                            </a>

                            <a href="{{ url('/admin/employee-delete/'.$emp->id) }}"
                               onclick="return confirm('Are you sure?')"
                               class="btn btn-sm btn-danger">
                                Delete
                            </a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

</body>
</html>
