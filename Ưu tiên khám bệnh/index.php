<?php


include 'Queue.php';
$queue = new Queue();
$queue->enqueue(5,'Smith');
$queue->enqueue(4,'Jones');
$queue->enqueue(6,'Fehrenbach');
$queue->enqueue(1,'Brown');
$queue->enqueue(1,'Ingram');
$dataPeople=$queue->queue;


?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
          integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <style>
        .search-input {
            width: 85% !important;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-12 page-title mb-2">
            <h1>QUẢN LÍ BỆNH NHÂN</h1>
            <div class="row">
                <div class="col-12 col-md-4">

                </div>
                <div class="col-12 col-md-8">
                    <form class="form-inline my-2 my-lg-0" method="get" action="">
                        <input class="form-control mr-sm-2 search-input" type="search" placeholder="Search"
                               aria-label="Search" name="keyword">
                        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-12">
            <table class="table">
                <thead class="thead-light">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Code</th>
                    <th scope="col">Name</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($dataPeople as $key => $people): ?>
                    <tr>
                        <th scope="row"><?php echo $key + 1 ?></th>
                        <td><?php echo $people['code'] ?></td>
                        <td><?php echo $people['name'] ?></td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>

        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card" style="width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title">Bênh nhân tiếp theo</h5>
                    <p class="card-text">
                        <?php
                            $bn = $queue->dequeue();
                            echo $bn['name']." Có mã ".$bn['code'];
                        ?>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>


<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
        crossorigin="anonymous"></script>
</body>
</html>





