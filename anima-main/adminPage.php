<?php

$dsn = 'mysql:host=localhost;dbname=anima';
$username = 'root';
$password = '';


try {
    $db = new PDO($dsn, $username, $password);
} catch (PDOException $e) {
    $error_message = $e->getMessage();
    exit();
}

$a = 1;

$coding_statement = $db->prepare("SELECT COUNT(*) FROM register where contestname = 'coding_contest'");
$coding_statement->execute();
$codingStatment = $coding_statement->fetchColumn();

$conference_statement = $db->prepare("SELECT COUNT(*) FROM register where contestname = 'conference_contest'");
$conference_statement->execute();
$conferenceStatement = $conference_statement->fetchColumn();

$workshop_statement = $db->prepare("SELECT COUNT(*) FROM register where contestname = 'workshop_contest'");
$workshop_statement->execute();
$workshopStatment = $workshop_statement->fetchColumn();

function codingDisplay($SNO)
{

    $dsn = 'mysql:host=localhost;dbname=anima';
    $username = 'root';
    $password = '';

    try {
        $db = new PDO($dsn, $username, $password);
    } catch (PDOException $e) {
        $e->getMessage();
        exit();
    }

    $statement = $db->prepare("SELECT * FROM register WHERE sno = $SNO and contestname = 'coding_contest'");
    $statement->execute();
    $stmt = $statement->fetchAll();
    foreach ($stmt as $stmt);
    if ($statement->rowCount() == 1) {
        echo $stmt['name'];
    } else {
        echo "NULL";
    }
}

function conferenceDisplay($SNO)
{

    $dsn = 'mysql:host=localhost;dbname=anima';
    $username = 'root';
    $password = '';

    try {
        $db = new PDO($dsn, $username, $password);
    } catch (PDOException $e) {
        $e->getMessage();
        exit();
    }

    $statement = $db->prepare("SELECT * FROM register WHERE sno = $SNO and contestname = 'conference_contest'");
    $statement->execute();
    $stmt = $statement->fetchAll();
    foreach ($stmt as $stmt);
    if ($statement->rowCount() == 1) {
        echo $stmt['name'];
    } else {
        echo "NULL";
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin Dashboard</title>

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600">
    <!-- https://fonts.google.com/specimen/Open+Sans -->
    <link rel="stylesheet" href="./css/fontawesome.min.css">
    <!-- https://fontawesome.com/ -->
    <link rel="stylesheet" href="./css/fullcalendar.min.css">
    <!-- https://fullcalendar.io/ -->
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <!-- https://getbootstrap.com/ -->
    <link rel="stylesheet" href="./css/tooplate.css">
</head>

<body id="reportsPage">
    <div class="" id="home">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav class="navbar navbar-expand-xl navbar-light bg-light">
                        <a class="navbar-brand" href="#">
                            <i class="fas fa-3x fa-tachometer-alt tm-site-icon"></i>
                            <h1 class="tm-site-title mb-0">Dashboard</h1>
                        </a>
                        <button class="navbar-toggler ml-auto mr-0" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>

                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav mx-auto">
                                <li class="nav-item">
                                    <a class="nav-link active" href="#">Dashboard
                                        <span class="sr-only">(current)</span>
                                    </a>
                                </li>
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Events
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="./admin/coding/coding_contest.php">Coding Contest</a>
                                        <a class="dropdown-item" href="./admin/coding/Conference.php">Conference</a>
                                        <a class="dropdown-item" href="#">Workshops</a>
                                    </div>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#">Register list</a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link" href="#">Accounts</a>
                                </li>

                            </ul>
                            <ul class="navbar-nav">
                                <li class="nav-item">
                                    <a class="nav-link d-flex" href="./login.php">
                                        <i class="far fa-user mr-2 tm-logout-icon"></i>
                                        <span>Logout</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </nav>
                </div>
            </div>
            <!-- row -->
            <!--Chart-->
            <div class="row tm-content-row tm-mt-big">
                <div class="tm-col tm-col-big">
                    <!-- <div class="bg-white tm-block h-100">
                        <h2 class="tm-block-title">Latest Hits</h2>
                        <canvas id="lineChart"></canvas>
                    </div> -->
                    <div>
                        <div id="piechart"></div>

                        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

                        <script type="text/javascript">
                            // Load google charts
                            google.charts.load('current', {
                                'packages': ['corechart']
                            });
                            google.charts.setOnLoadCallback(drawChart);

                            // Draw the chart and set the chart values
                            function drawChart() {
                                var data = google.visualization.arrayToDataTable([
                                    ['Event', 'Evemt Name'],
                                    ['Coding Contest', <?php echo $codingStatment ?>],
                                    ['Conference', <?php echo $conferenceStatement ?>],
                                    ['Workshop', <?php echo $workshopStatment ?>],
                                ]);

                                // Optional; add a title and set the width and height of the chart
                                var options = {
                                    'title': 'anima',
                                    'width': 550,
                                    'height': 400
                                };

                                // Display the chart inside the <div> element with id="piechart"
                                var chart = new google.visualization.PieChart(document.getElementById('piechart'));
                                chart.draw(data, options);
                            }
                        </script>
                    </div>
                </div>
                <div class="tm-col tm-col-big">
                    <!-- <div class="bg-white tm-block h-100">
                        <h2 class="tm-block-title">Performance</h2>
                        <canvas id="barChart"></canvas>
                    </div> -->
                </div>
                <div class="tm-col tm-col-small">
                    <!-- <div class="bg-white tm-block h-100">
                        <canvas id="pieChart" class="chartjs-render-monitor"></canvas>
                    </div> -->

                </div>

                <!--------------------------------Workshop Registered List------------------------------>
                <div class="tm-col tm-col-big">
                    <div class="bg-white tm-block h-100">
                        <div class="row">
                            <div class="col-8">
                                <h2 class="tm-block-title d-inline-block">Coding Contest Registered List</h2>

                            </div>

                        </div>
                        <ol class="tm-list-group tm-list-group-alternate-color tm-list-group-pad-big">
                            <li class="tm-list-group-item">
                                <?php codingDisplay("coding1") ?>
                            </li>
                            <li class="tm-list-group-item">
                                <?php codingDisplay(2) ?>
                            </li>
                            <li class="tm-list-group-item">
                                <?php codingDisplay(3) ?>
                            </li>
                            <li class="tm-list-group-item">
                                <?php codingDisplay(4) ?>
                            </li>
                            <li class="tm-list-group-item">
                                <?php codingDisplay(5) ?>
                            </li>
                            <li class="tm-list-group-item">
                                <?php codingDisplay(6) ?>
                            </li>
                            <li class="tm-list-group-item">
                                <?php codingDisplay(7) ?>
                            </li>
                            <li class="tm-list-group-item">
                                <?php codingDisplay(8) ?>
                            </li>
                            <li class="tm-list-group-item">
                                <?php codingDisplay(9) ?>
                            </li>
                            <li class="tm-list-group-item">
                                <?php codingDisplay(10) ?>
                            </li>
                        </ol>
                    </div>
                </div>
                <!-----------------------end registered list--------------------------------------->

                <!---->

                <div class="tm-col tm-col-big">
                    <div class="bg-white tm-block h-100">
                        <div class="row">
                            <div class="col-8">
                                <h2 class="tm-block-title d-inline-block">Workshop Registered List</h2>

                            </div>

                        </div>
                        <ol class="tm-list-group tm-list-group-alternate-color tm-list-group-pad-big">
                            <li class="tm-list-group-item">
                                <?php conferenceDisplay(1) ?>
                            </li>
                            <li class="tm-list-group-item">
                                <?php conferenceDisplay(2) ?>
                            </li>
                            <li class="tm-list-group-item">
                            <?php conferenceDisplay(3) ?>
                            </li>
                            <li class="tm-list-group-item">
                            <?php conferenceDisplay(4) ?>
                            </li>
                            <li class="tm-list-group-item">
                            <?php conferenceDisplay(5) ?>
                            </li>
                            <li class="tm-list-group-item">
                            <?php conferenceDisplay(6) ?>
                            </li>
                            <li class="tm-list-group-item">
                            <?php conferenceDisplay(8) ?>
                            </li>
                            <li class="tm-list-group-item">
                            <?php conferenceDisplay(9) ?>
                            </li>
                            <li class="tm-list-group-item">
                            <?php conferenceDisplay(10) ?>
                            </li>
                        </ol>
                    </div>
                </div>
                <!---->

                <div class="tm-col tm-col-small">
                    <div class="bg-white tm-block h-100">
                        <h2 class="tm-block-title">Upcoming Tasks</h2>
                        <ol class="tm-list-group">
                            <li class="tm-list-group-item">List of tasks</li>
                            <li class="tm-list-group-item">Lorem ipsum doloe</li>
                            <li class="tm-list-group-item">Read reports</li>
                            <li class="tm-list-group-item">Write email</li>

                            <li class="tm-list-group-item">Call customers</li>
                            <li class="tm-list-group-item">Go to meeting</li>
                            <li class="tm-list-group-item">Weekly plan</li>
                            <li class="tm-list-group-item">Ask for feedback</li>

                            <li class="tm-list-group-item">Meet Supervisor</li>
                            <li class="tm-list-group-item">Company trip</li>
                        </ol>
                    </div>
                </div>
            </div>
            <footer class="row tm-mt-small">
                <div class="col-12 font-weight-light">
                    <p class="d-inline-block tm-bg-black text-white py-2 px-4">
                        Copyright &copy; 2018 Admin Dashboard . Created by
                        <a rel="nofollow" href="https://www.tooplate.com" class="text-white tm-footer-link">FresherPark</a>
                    </p>
                </div>
            </footer>
        </div>
    </div>
    <script src="js/jquery-3.3.1.min.js"></script>
    <!-- https://jquery.com/download/ -->
    <script src="./js/moment.min.js"></script>
    <!-- https://momentjs.com/ -->
    <script src="./js/utils.js"></script>
    <script src="./js/Chart.min.js"></script>
    <!-- http://www.chartjs.org/docs/latest/ -->
    <script src="./js/fullcalendar.min.js"></script>
    <!-- https://fullcalendar.io/ -->
    <script src="./js/bootstrap.min.js"></script>
    <!-- https://getbootstrap.com/ -->
    <script src="./js/tooplate-scripts.js"></script>
    <script>
        let ctxLine,
            ctxBar,
            ctxPie,
            optionsLine,
            optionsBar,
            optionsPie,
            configLine,
            configBar,
            configPie,
            lineChart;
        barChart, pieChart;
        // DOM is ready
        $(function() {
            updateChartOptions();
            drawLineChart(); // Line Chart
            drawBarChart(); // Bar Chart
            drawPieChart(); // Pie Chart
            drawCalendar(); // Calendar

            $(window).resize(function() {
                updateChartOptions();
                updateLineChart();
                updateBarChart();
                reloadPage();
            });
        })
    </script>
</body>

</html>