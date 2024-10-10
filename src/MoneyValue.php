<?php

declare(strict_types=1);

namespace McarrowsmithPackages\MoneyValue;

use Money\Currencies\ISOCurrencies;
use Money\Currency;
use Money\Formatter\DecimalMoneyFormatter;
use Money\Money;
use Money\Parser\DecimalMoneyParser;

final class MoneyValue
{
    /**
     * @param non-empty-string $currency
     */
    public static function fromDecimal(string $amount, string $currency): self
    {
        return new self(
            (new DecimalMoneyParser(new ISOCurrencies))
                ->parse($amount, new Currency($currency))
        );
    }

    /**
     * @param non-empty-string $currency
     */
    public static function fromInt(int $amount, string $currency): self
    {
        return new self(
            new Money(
                $amount,
                new Currency($currency)
            )
        );
    }

    /**
     * @param array{
     *     amount: string,
     *     currencyCode: non-empty-string
     * } $state
     */
    public static function fromStateDecimal(array $state): self
    {
        return self::fromDecimal(
            $state['amount'],
            $state['currencyCode'],
        );
    }

    private function __construct(private Money $money)
    {
    }

    public function amount(): string
    {
        return $this->money->getAmount();
    }

    public function currency(): string
    {
        return $this->money->getCurrency()->getCode();
    }

    public function format(): string
    {
        return (new DecimalMoneyFormatter(new ISOCurrencies))
            ->format($this->money);
    }

    public function asValue(): Money
    {
        return $this->money;
    }
}
