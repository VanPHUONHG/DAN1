<!DOCTYPE html>
<html lang="en-US">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thống Kê Biểu Đồ</title>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <style>
        /* Reset margin, padding, and set a basic font */
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f0f2f5;
        }

        h1 {
            text-align: center;
            font-size: 2.5rem;
            color: #333;
            margin-top: 20px;
            font-weight: bold;
        }

        h2 {
            text-align: center;
            color: #555;
            font-size: 1.5rem;
            margin-bottom: 20px;
        }

        /* Container for the charts */
        .chart-container {
            display: flex;
            justify-content: center;
            align-items: flex-start;
            flex-wrap: wrap;
            gap: 30px;
            margin-top: 30px;
            padding: 0 10px;
        }

        /* Style for each chart box */
        .chart-box {
            width: 45%;
            max-width: 650px;
            height: 450px;
            border: 1px solid #ddd;
            background-color: #fff;
            padding: 20px;
            border-radius: 12px;
            box-shadow: 0 6px 15px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease-in-out, box-shadow 0.3s ease-in-out;
        }

        /* Hover effect for chart boxes */
        .chart-box:hover {
            transform: scale(1.05);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
        }

        /* Title and responsive chart boxes */
        @media (max-width: 768px) {
            .chart-box {
                width: 90%;
                height: 350px;
            }
        }

        /* Styling for the chart header */
        .chart-box h3 {
            text-align: center;
            color: #333;
            font-size: 1.2rem;
            margin-bottom: 20px;
        }

        /* Footer Style */
        footer {
            text-align: center;
            padding: 20px;
            background-color: #2c3e50;
            color: #fff;
            font-size: 1rem;
            margin-top: 50px;
        }

        footer a {
            color: #f39c12;
            text-decoration: none;
        }

        footer a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

<h1>Thống Kê Theo Biểu Đồ</h1>

<div class="chart-container">
    <div class="chart-box" id="categoryChart">
        <h3>Thống kê sản phẩm theo danh mục</h3>
    </div>
    <div class="chart-box" id="hotProductsChart">
        <h3>Top 10 sản phẩm bán chạy nhất</h3>
    </div>
    <div class="chart-box" id="customersChart">
        <h3>Khách hàng chi tiêu nhiều nhất</h3>
    </div>
    <div class="chart-box" id="revenueChart">
        <h3>Tổng doanh thu</h3>
    </div>
</div>

<script type="text/javascript">
    // Load Google Charts
    google.charts.load('current', {'packages':['corechart']});
    google.charts.setOnLoadCallback(drawCharts);

    function drawCharts() {
        drawCategoryChart();
        drawHotProductsChart();
        drawCustomersChart();
        drawRevenueChart();
    }

    // 1. Biểu đồ danh mục sản phẩm
    // Biểu đồ danh mục sản phẩm
function drawCategoryChart() {
    var data = google.visualization.arrayToDataTable([
        ['Danh mục', 'Số lượng sản phẩm'],
        <?php
        // Danh mục sản phẩm với số lượng, bạn có thể thay đổi giá trị số lượng tùy ý.
        $categories = [
            ['Jodan', 33],
            ['Nike', 32],
            ['Balenciaga', 31],
            ['Adidas', 30],
            ['Puma', 29],
            ['Converse', 28],
            ['Vans', 27],
            ['Gucci', 26],
            ['New Balance', 25]
        ];

        foreach ($categories as $index => $category) {
            echo "['" . $category[0] . "', " . $category[1] . "]";
            if ($index < count($categories) - 1) echo ",";
        }
        ?>
    ]);
    var options = {
        title: 'Thống kê sản phẩm theo danh mục',
        pieHole: 0.4,
        width: '100%',
        height: 350,
        backgroundColor: '#f9f9f9',
        chartArea: {left: 50, top: 50, width: '90%', height: '75%'}
    };
    var chart = new google.visualization.PieChart(document.getElementById('categoryChart'));
    chart.draw(data, options);
}


    // 2. Biểu đồ sản phẩm bán chạy
    function drawHotProductsChart() {
        var data = google.visualization.arrayToDataTable([
            ['Sản phẩm', 'Số lượng bán ra'],
            <?php
            $hotProducts = loadall_sanpham_hot();
            foreach ($hotProducts as $index => $product) {
                echo "['" . $product['tensp'] . "', " . $product['total_sold'] . "]";
                if ($index < count($hotProducts) - 1) echo ",";
            }
            ?>
        ]);
        var options = {
            title: 'Top 10 sản phẩm bán chạy nhất',
            hAxis: {title: 'Sản phẩm'},
            vAxis: {title: 'Số lượng'},
            legend: 'none',
            width: '100%',
            height: 350,
            backgroundColor: '#f9f9f9',
            chartArea: {left: 50, top: 50, width: '90%', height: '75%'}
        };
        var chart = new google.visualization.ColumnChart(document.getElementById('hotProductsChart'));
        chart.draw(data, options);
    }

    // 3. Biểu đồ khách hàng chi tiêu nhiều nhất
    function drawCustomersChart() {
        var data = google.visualization.arrayToDataTable([
            ['Khách hàng', 'Tổng chi tiêu'],
            <?php
            $customers = loadall_khachhang();
            foreach ($customers as $index => $kh) {
                echo "['" . $kh['bill_name'] . "', " . $kh['total_spent'] . "]";
                if ($index < count($customers) - 1) echo ",";
            }
            ?>
        ]);
        var options = {
            title: 'Khách hàng chi tiêu nhiều nhất',
            pieHole: 0.4,
            width: '100%',
            height: 350,
            backgroundColor: '#f9f9f9',
            chartArea: {left: 50, top: 50, width: '90%', height: '75%'}
        };
        var chart = new google.visualization.PieChart(document.getElementById('customersChart'));
        chart.draw(data, options);
    }

    // 4. Tổng doanh thu
    function drawRevenueChart() {
        var data = google.visualization.arrayToDataTable([
            ['Loại', 'Doanh thu'],
            <?php
            $totalRevenue = loadall_doanhthu();
            echo "['Doanh thu', " . $totalRevenue . "]";
            ?>
        ]);
        var options = {
            title: 'Tổng doanh thu',
            pieHole: 0.4,
            width: '100%',
            height: 350,
            backgroundColor: '#f9f9f9',
            chartArea: {left: 50, top: 50, width: '90%', height: '75%'}
        };
        var chart = new google.visualization.PieChart(document.getElementById('revenueChart'));
        chart.draw(data, options);
    }
</script>

</body>
</html>
