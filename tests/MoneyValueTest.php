<?php

declare(strict_types=1);

namespace Tests;

use McarrowsmithPackages\MoneyValue\MoneyValue;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;

final class MoneyValueTest extends TestCase
{
    #[Test]
    public function it_can_be_created_from_decimal(): void
    {
        $money = MoneyValue::fromDecimal('42.36', 'GBP');

        $this->assertEquals(
            '4236',
            $money->amount()
        );

        $this->assertEquals(
            'GBP',
            $money->currency()
        );
    }

    #[Test]
    public function it_can_be_created_from_integer(): void
    {
        $money = MoneyValue::fromInt(4236, 'GBP');

        $this->assertEquals(
            '4236',
            $money->amount()
        );

        $this->assertEquals(
            'GBP',
            $money->currency()
        );
    }

    #[Test]
    public function it_can_be_created_from_state(): void
    {
        $money = MoneyValue::fromStateDecimal([
            'amount'       => '42.36',
            'currencyCode' => 'GBP'
        ]);

        $this->assertEquals(
            '4236',
            $money->amount()
        );

        $this->assertEquals(
            'GBP',
            $money->currency()
        );
    }
}
