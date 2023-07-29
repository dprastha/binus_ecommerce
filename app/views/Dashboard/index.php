<!DOCTYPE html>
<html>

<head>
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Add any additional CSS or JS libraries here for charting (e.g., Chart.js) -->
</head>

<body>
    <div class="container mt-4">
        <h2>Dashboard</h2>
        <div class="row mt-4">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Total Barang</h5>
                        <p class="card-text"><?php echo $totalItems; ?></p>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Sisa Barang Belum Terjual</h5>
                        <p class="card-text"><?php echo $leftItems; ?></p>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mt-4">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Keuntungan Tiap Barang</h5>
                        <canvas id="profitEachItem"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        // Chart data from PHP
        var chartData = <?php echo json_encode($chartData); ?>;

        // Prepare chart data
        console.log(chartData);
        var labels = Object.keys(chartData);
        var data = Object.values(chartData);

        // Create chart
        var ctx = document.getElementById('profitEachItem').getContext('2d');
        var chart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: labels,
                datasets: [{
                    label: 'Keuntungan',
                    data: data,
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 1,
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
</body>

</html>