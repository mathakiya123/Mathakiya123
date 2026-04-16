<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>All Users</title>

<!-- Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

<!-- Bootstrap Icons -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

<style>


/* Background */
body {
     background-color: #eef2f7;
    min-height: 100vh;
}

/* Card Design */
.user-card {
    background: #ffffff;
    border-radius: 20px;
    box-shadow: 0 15px 35px rgba(0,0,0,0.15);
    overflow: hidden;
}

/* Header */
.user-card .card-header {
    background: transparent;
    border-bottom: 1px solid #eee;
}

/* Table */
.table thead {
    background: #f8f9fa;
}

.table thead th {
    font-size: 13px;
    text-transform: uppercase;
    letter-spacing: 1px;
    color: #6c757d;
}

.table tbody tr {
    transition: all 0.3s ease;
}

.table tbody tr:hover {
    background-color: #f1f3ff;
    transform: scale(1.01);
}

/* Profile Image */
.profile-img {
    width: 55px;
    height: 55px;
    border-radius: 50%;
    object-fit: cover;
    border: 3px solid #e9ecef;
    transition: 0.3s;
}

.profile-img:hover {
    transform: scale(1.1);
}

/* Buttons */
.btn-action {
    width: 35px;
    height: 35px;
    padding: 0;
    border-radius: 50%;
    display: inline-flex;
    align-items: center;
    justify-content: center;
}

/* Badge Count */
.total-badge {
    background: #667eea;
    font-size: 14px;
    padding: 6px 14px;
    border-radius: 20px;
}

</style>

</head>
<body>

<div class="container py-5">

    <div class="card user-card p-4">

        <!-- Header -->
        <div class="card-header d-flex justify-content-between align-items-center pb-3">
            <h4 class="fw-bold mb-0">All Users</h4>
            <span class="text-white total-badge">
                Total: {{ count($users) }}
            </span>
        </div>

        <!-- Table -->
        <div class="table-responsive mt-3">
            <table class="table align-middle text-center">

                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Photo</th>
                        <th>Full Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th width="120">Action</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach($users as $user)
                    <tr>

                        <td class="fw-bold text-primary">
                            #{{ $user->id }}
                        </td>

                        <td>
                            <img src="{{ asset('uploads/'.$user->photo) }}" 
                                 class="profile-img">
                        </td>

                        <td class="fw-semibold">
                            {{ $user->fullname }}
                        </td>

                        <td class="text-muted">
                            {{ $user->email }}
                        </td>

                        <td>
                            <span class="badge bg-light text-dark px-3 py-2 shadow-sm">
                                {{ $user->phone }}
                            </span>
                        </td>

                        <td>
                    
                            <a href="{{ url('admin/user-delete/'.$user->id) }}" 
                               onclick="return confirm('Are you sure?')" 
                               class="btn btn-outline-danger btn-sm btn-action">
                                <i class="bi bi-trash"></i>
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