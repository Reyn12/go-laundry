<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Riwayat Pesanan - Go Laundry</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .status-selesai {
            color: #28a745;
            background-color: #d4edda;
            border-radius: 15px;
            padding: 5px 10px;
            font-size: 0.9em;
        }
        .status-dilaundry {
            color: #dc3545;
            background-color: #f8d7da;
            border-radius: 15px;
            padding: 5px 10px;
            font-size: 0.9em;
        }
        .reorder-btn {
            background-color: #f8f9fa;
            border: 1px solid #dee2e6;
            border-radius: 5px;
            padding: 5px 10px;
        }
    </style>
</head>
<body class="bg-light">
    <div class="container mt-4">
        <div class="card">
            <div class="card-body">
                <h4 class="mb-3">Riwayat Pesanan</h4>
                
                <div class="date-filter mb-4">
                    <select class="form-select w-auto">
                        <option>Apr 1 - Apr 30 2024</option>
                    </select>
                </div>

                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Amount</th>
                                <th>Date</th>
                                <th>Status</th>
                                <th>Total Price</th>
                                <th>Reorder</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>Baju</td>
                                <td>3 Pcs</td>
                                <td>02 Apr</td>
                                <td><span class="status-selesai">Selesai</span></td>
                                <td>30.000</td>
                                <td><button class="reorder-btn">↻</button></td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>Celana</td>
                                <td>5 Pcs</td>
                                <td>05 Apr</td>
                                <td><span class="status-dilaundry">Dilaundry</span></td>
                                <td>23.679</td>
                                <td><button class="reorder-btn">↻</button></td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td>Handuk</td>
                                <td>1 Pcs</td>
                                <td>07 Apr</td>
                                <td><span class="status-selesai">Selesai</span></td>
                                <td>30.000</td>
                                <td><button class="reorder-btn">↻</button></td>
                            </tr>
                            <tr>
                                <td>4</td>
                                <td>Baju</td>
                                <td>5 Pcs</td>
                                <td>10 Apr</td>
                                <td><span class="status-selesai">Selesai</span></td>
                                <td>15.000</td>
                                <td><button class="reorder-btn">↻</button></td>
                            </tr>
                            <tr>
                                <td>5</td>
                                <td>Celana</td>
                                <td>3 Pcs</td>
                                <td>15 Apr</td>
                                <td><span class="status-dilaundry">Dilaundry</span></td>
                                <td>25.000</td>
                                <td><button class="reorder-btn">↻</button></td>
                            </tr>
                            <tr>
                                <td>6</td>
                                <td>Handuk</td>
                                <td>5 Pcs</td>
                                <td>20 Apr</td>
                                <td><span class="status-dilaundry">Dilaundry</span></td>
                                <td>10.456</td>
                                <td><button class="reorder-btn">↻</button></td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div class="text-center mt-3">
                    <button class="btn btn-link">View All</button>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>