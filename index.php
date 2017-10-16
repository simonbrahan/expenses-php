<?php
require 'expenses_funcs.php';

if (isset($_POST['add_expense'])) {
    addExpense(
        $_POST['description'],
        $_POST['amount'],
        $_POST['applied_on']
    );
}

require 'templates/index.php';
