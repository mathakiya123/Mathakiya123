<!DOCTYPE html>
<html>
<head>
    <title>Edit Leave</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        body {
            background: linear-gradient(135deg, #4e73df, #1cc88a);
            min-height: 100vh;
        }

        .card {
            border: none;
            border-radius: 15px;
        }

        .card-header {
            border-radius: 15px 15px 0 0;
            background: linear-gradient(90deg, #4e73df, #224abe);
        }

        .form-control, .form-select {
            border-radius: 8px;
        }

        .btn-custom {
            background: linear-gradient(90deg, #f6c23e, #dda20a);
            border: none;
            border-radius: 8px;
            font-weight: 600;
            letter-spacing: 0.5px;
        }

        .btn-custom:hover {
            background: linear-gradient(90deg, #dda20a, #b8860b);
        }
    </style>
    <thead></thead>
<body class="bg-light">

<div class="container mt-5">
    <div class="card shadow">
        <div class="card-header bg-warning text-dark">
            <h4>Edit Leave</h4>
        </div>
        @if(session('success'))
    <div class="alert alert-success alert-dismissible fade show">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
@endif


        <div class="card-body">
            <form method="POST">
                @csrf
                

                <div class="mb-3">
                    <label>Employee Name</label>
                    <input type="text" name="employee_name"
                        value="{{ $edit->employee_name }}"
                        class="form-control">
                </div>

                <div class="mb-3">
                    <label>Leave Type</label>
                    <select name="type" class="form-select">
                        <option value="Sick" {{ $edit->type=='Sick' ? 'selected' : '' }}>Sick</option>
                        <option value="Casual" {{ $edit->type=='Casual' ? 'selected' : '' }}>Casual</option>
                        <option value="Vacation" {{ $edit->type=='Vacation' ? 'selected' : '' }}>Vacation</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label>Start Date</label>
                    <input type="date" name="start_date"
                        value="{{ $edit->start_date }}"
                        class="form-control">
                </div>

                <div class="mb-3">
                    <label>End Date</label>
                    <input type="date" name="end_date"
                        value="{{ $edit->end_date }}"
                        class="form-control">
                </div>

                <div class="mb-3">
                    <label>Reason</label>
                    <textarea name="reason" class="form-control" rows="3">{{ $edit->reason }}</textarea>
                </div>

                <button type="submit" class="btn btn-primary w-100">
                    Update
                </button>
            </form>
        </div>
    </div>
</div>

</body>
</html>
