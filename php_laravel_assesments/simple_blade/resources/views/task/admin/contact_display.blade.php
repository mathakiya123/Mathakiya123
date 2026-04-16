<!DOCTYPE html>
<html>
<head>
    <title>User List</title>
    <style>
        body{
            font-family: Arial, sans-serif;
            background: #f4f6f8;
        }

        h2{
            text-align: center;
            margin-bottom: 20px;
        }

        table{
            width: 90%;
            margin: auto;
            border-collapse: collapse;
            background: #fff;
            box-shadow: 0 4px 10px rgba(0,0,0,0.1);
        }

        th{
            background: #0d6efd;
            color: white;
            padding: 12px;
            text-transform: uppercase;
            font-size: 14px;
        }

        td{
            padding: 10px;
            text-align: center;
            border-bottom: 1px solid #ddd;
        }

        tr:hover{
            background: #f1f1f1;
        }

        .btn{
            padding: 6px 12px;
            border-radius: 4px;
            text-decoration: none;
            color: white;
            font-size: 13px;
        }

        .btn-edit{
            background: #198754;
        }

        .btn-delete{
            background: #dc3545;
        }
    </style>
</head>
<body>

<h2>List All Users</h2>

<table>
    <tr>
        <th>Name</th>
        <th>Email</th>
        <th>Phone</th>
        <th>Subject</th>
        <th>Message</th>
        <th>Action</th>
    </tr>

    @forelse($contacts as $contact)
    <tr>
        <td>{{ $contact->name }}</td>
        <td>{{ $contact->email }}</td>
        <td>{{ $contact->phone }}</td>
        <td>{{ $contact->subject }}</td>
        <td>{{ $contact->message }}</td>    
        <td>
            
            <a href="{{url('/admin/contact-delete/'.$contact->id)}}" onclick="return confirm('are you sure delete data ?')"
             class="btn btn-delete">Delete</a>
        </td>
    </tr>
    @empty
    <tr>
        <td colspan="6">No data found</td>
    </tr>
    @endforelse
</table>

</body>
</html>
