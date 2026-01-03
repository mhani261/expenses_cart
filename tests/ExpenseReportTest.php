<?php

declare(strict_types=1);

namespace Tests;
use ExpenseReport\Expense;
use ExpenseReport\ExpenseReport;
use ExpenseReport\ExpenseType;
use PHPUnit\Framework\TestCase;

class ExpenseReportTest extends TestCase
{
    /** @test */
    public function characteristic_test(): void
    {
        $expensesData = [
            new Expense(ExpenseType::BREAKFAST, 100),
            new Expense(ExpenseType::DINNER, 2000),
            new Expense(ExpenseType::DINNER, 2000),
            new Expense(ExpenseType::CAR_RENTAL, 2000),
            new Expense(ExpenseType::DINNER, 6000),
            new Expense(ExpenseType::BREAKFAST, 700),
        ];

        ob_start();
        $report = new ExpenseReport();
        $report->print_report($expensesData);
        $output = ob_get_clean();

        $expected =
            'Expense Report ' . date("Y-m-d h:i:sa") . '' . "\n" .
            'Breakfast	100	 ' . "\n" .
            'Dinner	2000	 ' . "\n" .
            'Dinner	2000	 ' . "\n" .
            'Car Rental	2000	 ' . "\n" .
            'Dinner	6000	X' . "\n" .
            'Breakfast	700	 ' . "\n" .
            'Meal Expenses: 10800' . "\n" .
            'Total Expenses: 12800' . "\n";

        $this->assertEquals($expected, $output);
    }
}
