<!DOCTYPE html>
<html>
<head>
    <title>Apply Leave</title>
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
            background: linear-gradient(90deg, #1cc88a, #17a673);
            border: none;
            border-radius: 8px;
            font-weight: 600;
            letter-spacing: 0.5px;
        }

        .btn-custom:hover {
            background: linear-gradient(90deg, #17a673, #13855c);
        }
    </style>
</head>

<body>

<div class="container d-flex justify-content-center align-items-center" style="min-height: 100vh;">
    <div class="col-md-6 col-lg-5">

        <div class="card shadow-lg">
            <div class="card-header text-white text-center py-3">
                <h4 class="mb-0">
                    <i class="bi bi-calendar-check me-2"></i>
                    Apply Leave
                </h4>
            </div>

            @if(session('success'))
    <div class="alert alert-success alert-dismissible fade show">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
@endif


            <div class="card-body p-4">
                <form method="POST">
                    @csrf

                    <!-- Employee Name -->
                    <div class="mb-3">
                        <label class="form-label fw-semibold">
                            <i class="bi bi-person-fill me-1"></i> Employee Name
                        </label>
                        <input type="text" name="employee_name" class="form-control" placeholder="Enter your name">
                    </div>

                    <!-- Leave Type -->
                    <div class="mb-3">
                        <label class="form-label fw-semibold">
                            <i class="bi bi-list-check me-1"></i> Leave Type
                        </label>
                        <select name="type" class="form-select">
                            <option value="">Select Leave Type</option>
                            <option value="Sick">Sick</option>
                            <option value="Casual">Casual</option>
                            <option value="Vacation">Vacation</option>
                        </select>
                    </div>

                    <!-- Dates Row -->
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-semibold">
                                <i class="bi bi-calendar-event me-1"></i> Start Date
                            </label>
                            <input type="date" name="start_date" class="form-control">
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-semibold">
                                <i class="bi bi-calendar-x me-1"></i> End Date
                            </label>
                            <input type="date" name="end_date" class="form-control">
                        </div>
                    </div>

                    <!-- Reason -->
                    <div class="mb-4">
                        <label class="form-label fw-semibold">
                            <i class="bi bi-chat-left-text me-1"></i> Reason
                        </label>
                        <textarea name="reason" class="form-control" rows="3" placeholder="Write your reason here..."></textarea>
                    </div>

                    <!-- Status -->
<div class="mb-4">
    <label class="form-label fw-semibold">
        <i class="bi bi-info-circle me-1"></i> Status
    </label>
    <select name="status" class="form-select">
        <option value="Pending" selected>Pending</option>
        <option value="Approved">Approved</option>
        <option value="Rejected">Rejected</option>
    </select>
</div>

                    <!-- Submit -->
                    <button type="submit" class="btn btn-custom w-100 py-2 text-white">
                        <i class="bi bi-send-fill me-1"></i> Submit Leave Request
                    </button>
                        <br><br>
                    <a href="leave-list" class="btn btn-custom w-100 py-2 text-white">back</a>
                </form>
            </div>
        </div>

    </div>
</div>

</body>
</html>
