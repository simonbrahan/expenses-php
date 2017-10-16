<?php
function getLastTen()
{
    $conn = getConn();

    $res = $conn->query(
        'select description, amount, applied_on from expense order by applied_on desc limit 10'
    );

    return $res->fetchAll(PDO::FETCH_ASSOC);
}

function groupByDate($expenses)
{
    $grouped_expenses = array();

    foreach ($expenses as $ungrouped_expense) {
        if (!array_key_exists($ungrouped_expense['applied_on'], $grouped_expenses)) {
            $grouped_expenses[$ungrouped_expense['applied_on']] = array();
        }

        $grouped_expenses[$ungrouped_expense['applied_on']][] = $ungrouped_expense;
    }

    ksort($grouped_expenses);

    return array_reverse($grouped_expenses);
}

function getCategories()
{
    $conn = getConn();

    $res = $conn->query(
        'select
             lower(substring_index(description, " ", 1)) category,
             sum(amount) as total
         from expense
         group by lower(substring_index(description, " ", 1))
         order by total desc'
    );

    return $res->fetchAll(PDO::FETCH_ASSOC);
}

function addExpense($description, $amount, $applied_on)
{
    $conn = getConn();

    $q = $conn->prepare(
        'insert into expense(description, amount, applied_on)
         values(?, ?, ?)'
    );

    $q->execute(array($description, $amount, $applied_on));
}

function getConn()
{
    list($db, $username, $password) = explode(' ', trim(file_get_contents('../config.txt')));

    return new \PDO('mysql:dbname=' . $db . ';', $username, $password);
}
