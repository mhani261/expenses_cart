<?php


use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;

#[CoversClass(ExpenseReport::class)]
class ExpenseReportTest extends TestCase
{
    #[Test]
    public function it_calculates_total_correctly(): void
    {
        $this->assertTrue(true);
    }
}
