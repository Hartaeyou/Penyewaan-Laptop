<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Surat Jalan</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
        }
        .container {
            width: 100%;
            max-width: 800px;
            margin: 0 auto;
            padding: 0px;
            border: 0px solid #000;
        }
        .header, .footer {
            text-align: center;
            margin-bottom: 20px;
        }
        .header img {
            max-width: 300px;
            margin-bottom: 10px;
        }
        .header h1 {
            margin: 0;
            font-size: 24px;
        }
        .details {
            margin-bottom: 20px;
        }
        .details table {
            width: 100%;
            border-collapse: collapse;
        }
        .details th, .details td {
            padding: 8px;
            border: 1px solid #000;
            text-align: left;
        }
        .details th {
            background-color: #f2f2f2;
        }
        .items table {
            width: 100%;
            border-collapse: collapse;
        }
        .items th, .items td {
            padding: 8px;
            border: 1px solid #000;
            text-align: center;
        }
        .items th {
            background-color: #f2f2f2;
        }
        .signature {
            margin-top: 40px;
            display: flex;
            justify-content: space-between;
        }
        .signature div {
            text-align: center;
            width: 200px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <img src="#" alt="Laptop Chooice">
            <h1>History</h1>
        </div>

        <div class="details">
            <table>
                <tr>
                    <th>User ID</th>
                    <td>{{ $history->first()->user_id }}</td>
                </tr>
                <tr>
                    <th>Unit ID</th>
                    <td>{{ $history->first()->unit_id }}</td>
                </tr>
                <tr>
                    <th>Tanggal</th>
                    <td>{{ date('d/m/y') }}</td>
                </tr>
            </table>
        </div>

        <div class="items">
            <table>
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Code</th>
						<th>Price</th>
						<th>Status</th>
                        <th>Borrow Date</th>
						<th>Due Date</th>
						<th>Return Date</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($history as $loan)
                    <tr>
                        <td>{{ $loan->unit->name }}</td>
                        <td>{{ $loan->unit->code }}</td>
                        <td>{{ $loan->deliver_price }}</td>
                        <td>{{ $loan->status }}</td>
                        <td>{{ $loan->borrow_date }}</td>
                        <td>{{ $loan->due_date }}</td>
                        <td>{{ $loan->return ? $loan->return->return_date : 'Not returned' }}</td>

                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>