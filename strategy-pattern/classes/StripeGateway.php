<?php

class StripeGateway implements PaymentGateway {
    public function processPayment(float $amount): bool {
        return (bool)random_int(0, 1);
    }
}
