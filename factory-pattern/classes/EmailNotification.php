<?php

class EmailNotification implements Notification {
    public function sendNotification(): string {
        return "Sending notification via Email.";
    }
}