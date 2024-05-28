<?php

class SMSNotification implements Notification {
    public function sendNotification(): string {
        return "Sending notification via SMS.";
    }
}