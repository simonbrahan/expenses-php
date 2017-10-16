<?php
function getLastTen()
{
    return array(
        array(
            'amount' => 1.5,
            'description' => 'coffee',
            'applied_on' => new \DateTime('2017-10-16')
        ),
        array(
            'amount' => 4,
            'description' => 'lunch thai',
            'applied_on' => new \DateTime('2017-10-15')
        ),
        array(
            'amount' => 1.5,
            'description' => 'coffee',
            'applied_on' => new \DateTime('2017-10-14')
        ),
        array(
            'amount' => 1.5,
            'description' => 'coffee',
            'applied_on' => new \DateTime('2017-10-13')
        ),
        array(
            'amount' => 2.5,
            'description' => 'lunch pasta',
            'applied_on' => new \DateTime('2017-10-13')
        ),
        array(
            'amount' => 1.5,
            'description' => 'coffee',
            'applied_on' => new \DateTime('2017-10-12')
        ),
        array(
            'amount' => 60,
            'description' => 'car diesel',
            'applied_on' => new \DateTime('2017-10-12')
        ),
        array(
            'amount' => 1.5,
            'description' => 'coffee',
            'applied_on' => new \DateTime('2017-10-12')
        ),
        array(
            'amount' => 1.5,
            'description' => 'coffee',
            'applied_on' => new \DateTime('2017-10-11')
        ),
        array(
            'amount' => 1.5,
            'description' => 'coffee',
            'applied_on' => new \DateTime('2017-10-10')
        )
    );
}

function groupByDate($expenses)
{
    $grouped_expenses = array();

    foreach ($expenses as $ungrouped_expense) {
        if (!array_key_exists(dateToStr($ungrouped_expense['applied_on']), $grouped_expenses)) {
            $grouped_expenses[dateToStr($ungrouped_expense['applied_on'])] = array();
        }

        $grouped_expenses[dateToStr($ungrouped_expense['applied_on'])][] = $ungrouped_expense;
    }

    ksort($grouped_expenses);

    return array_reverse($grouped_expenses);
}

function getCategories()
{
    return array(
        array(
            'category' => 'car',
            'total' => 60
        ),
        array(
            'category' => 'coffee',
            'total' => 10.5
        ),
        array(
            'category' => 'lunch',
            'total' => 6.5
        )
    );
}

function add($description, $amount, $applied_on)
{
    return;
}

function dateToStr(\DateTime $date)
{
    return $date->format('Y-m-d');
}
