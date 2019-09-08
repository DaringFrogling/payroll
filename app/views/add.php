<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Payroll - add</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
<!-- Container -->
<div class="container pt-1">
    <!-- Row -->
    <div class="row">
        <!-- Form -->
        <form action="" method="post">
            <a href="/" class="text-dark">
                <h2>Payroll</h2>
            </a>

            <div class="form-group row">
                <label for="employee-name" class="col-sm-4 col-form-label">Worker name</label>
                <div class="col-sm-8">
                    <input type="text" name="employee-name" class="form-control" id="employee-name"
                           value="<?= $employee ?>" placeholder="Ivan Mazepa" required>
                </div>
            </div>

            <div class="form-group row">
                <label for="department" class="col-sm-4 col-form-label">Department</label>
                <div class="col-sm-8">
                    <select name="department" id="department" class="form-control" required>
                        <option value="0" <?php if ($department === '0') echo 'selected' ?>>Choose a department</option>
                        <option value="1" <?php if ($department === '1') echo 'selected' ?>>Mobile phones</option>
                        <option value="2" <?php if ($department === '2') echo 'selected' ?>>TV sets</option>
                        <option value="3" <?php if ($department === '3') echo 'selected' ?>>Computers</option>
                    </select>
                </div>
            </div>

            <div class="form-group row">
                <label for="produced-products" class="col-sm-4 col-form-label">Produced products</label>
                <div class="col-sm-8">
                    <input type="number" name="produced-products" class="form-control" id="produced-products"
                           value="<?= $amount ?>" placeholder="*" required>
                </div>
            </div>

            <div class="form-group row">
                <label for="salary" class="col-sm-4 col-form-label">Salary</label>
                <div class="col-sm-8">
                    <input type="text" name="salary" class="form-control" value="<?= $salary ?>" id="salary">
                </div>
            </div>

            <div class="form-group row">
                <div class="col-sm-8">
                    <button type="submit" name="submit" id="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>

            <?php if ($result): ?>
                <div class='alert alert-success' role='alert'>
                    Data has been added!
                </div>
            <?php endif; ?>
            <?php if (isset($errors) && is_array($errors)): ?>
                <ul>
                    <?php foreach ($errors as $error): ?>
                        <li class="alert"><?= $error ?></li>
                    <?php endforeach; ?>
                </ul>
            <?php endif; ?>
        </form>
        <!-- End of form -->
    </div>
    <!-- End of row -->
</div>
<!-- End of container -->
<script src="https://code.jquery.com/jquery-3.4.1.min.js"
        integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
        crossorigin="anonymous"></script>
<script src="/app/js/form.js"></script>
</body>
</html>