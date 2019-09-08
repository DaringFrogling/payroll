<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Payroll</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
<!-- Container -->
<div class="container pt-1">
    <!-- Row -->
    <div class="row">
        <!-- header -->
        <div class="col-6">
            <a href="/" class="text-dark">
                <h2>View payroll data</h2>
            </a>
        </div>
        <div class="col-2">
            <a href="/add" class="btn btn-outline-primary float-right">Add</a>
        </div>
        <div class="col-4">
            <input type="text" class="form-control" id="search-input" onkeyup="searchByName()" placeholder="Search by name">
        </div>
        <!-- end of header -->
        <!-- Table -->
        <table class="table table-hover" id="main-table">
            <thead>
            <tr>
                <th>#</th>
                <th><a href="#" class="text-dark text-shadow" onclick="sortTable('main-table', 1)">Full Name</a></th>
                <th>Department</th>
                <th><a href="#" class="text-dark text-shadow" onclick="sortTable('main-table', 3)">Amount of created products</a></th>
                <th><a href="#" class="text-dark text-shadow" onclick="sortTable('main-table', 4)">Salary</a></th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($recordsList as $singleRecord): ?>
                <tr>
                    <td><?=$singleRecord['id'];?></td>
                    <td><?=$singleRecord['employee_id'];?></td>
                    <td><?=$singleRecord['product_id'];?></td>
                    <td><?=$singleRecord['amount'];?></td>
                    <td><?=$singleRecord['salary'];?></td>
                    <td>
                        <a href="/edit/<?=$singleRecord['id'];?>" id="edit-row">Edit</a>
                        <a href="#" id="delete-row" data-id="<?=$singleRecord['id'];?>">Delete</a>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
        <!-- End of Table -->
    </div>
    <!-- End of Row -->
</div>
<!-- End of Container -->
<script src="https://code.jquery.com/jquery-3.4.1.min.js"
        integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
        crossorigin="anonymous"></script>
<script src="/app/js/index.js"></script>
</body>
</html>