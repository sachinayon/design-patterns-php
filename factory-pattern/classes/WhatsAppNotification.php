<?php

class WhatsAppNotification implements Notification {
    public function sendNotification(): string {
        return "Sending notification via WhatsApp.";
    }
}