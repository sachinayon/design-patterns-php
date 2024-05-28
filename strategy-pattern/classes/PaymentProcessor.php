<?php

class PaymentProcessor {
    private $paymentGateway;

    public function __construct(PaymentGateway $paymentGateway) {
        $this->paymentGateway = $paymentGateway;
    }

    public function processPayment(float $amount): bool {
        return $this->paymentGateway->processPayment($amount);
    }
}