<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Expenses</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
        <style>
            body > div:not(.container) {
                display:none;
            }
        </style
    </head>
    <body>
        <div class="container">
            <div class="row bg-primary">
                <h1>Expenses Tracker</h1>
            </div>
            <div class="row">
                <div class="col-md-8">
                    <h2>Add Expense</h2>
                    <form method="post">
                    <div class="form-group">
                        <label for="amount">Amount</label>
                        <div class="input-group">
                            <span class="input-group-addon">&pound;</span>
                            <input type="number" class="form-control" name="amount" id="amount" step="any">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <input type="text" class="form-control" name="description" id="description">
                    </div>
                    <div class="form-group">
                        <label for="applied_on">When</label>
                        <input
                            type="date"
                            class="form-control"
                            name="applied_on"
                            id="applied_on"
                            value="<?php echo date('Y-m-d') ?>"
                        >
                    </div>
                    <input name="add_expense" type="submit" class="btn btn-default">
                    </form>
                    <h2>Category Totals</h2>
                    <ul>
                    <?php foreach (getCategories() as $category) : ?>
                        <li>
                            &pound;<?php echo number_format($category['total'], 2) ?> -
                            <?php echo htmlspecialchars($category['category']) ?>
                        </li>
                    <?php endforeach ?>
                    </ul>
                </div>
                <div class="col-md-4">
                    <h2>Expenses List</h2>
                    <ul class="list-unstyled">
                    <?php foreach (groupByDate(getLastTen()) as $applied_on => $group) : ?>
                        <li>
                            <h3><?php echo $applied_on ?></h3>
                            <ul class="list-unstyled">
                                <?php foreach ($group as $expense) : ?>
                                    <li>
                                        <ul class="list-unstyled">
                                            <li>&pound;<?php echo number_format($expense['amount'], 2) ?></li>
                                            <li><?php echo htmlspecialchars($expense['description']) ?></li>
                                        </ul>
                                    </li>
                                <?php endforeach ?>
                            </ul>
                        </li>
                    <?php endforeach ?>
                    </ul>
                </div>
            </div>
        </div>
    </body>
</html>
