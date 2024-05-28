<?php

class NotificationFactory {
    public static function createNotification(string $type): Notification {
        switch ($type) {
            case 'email':
                return new EmailNotification();
            case 'sms':
                return new SMSNotification();
            case 'whatsapp':
                return new WhatsAppNotification();
            default:
                throw new InvalidArgumentException("Invalid notification type.");
        }
    }
}