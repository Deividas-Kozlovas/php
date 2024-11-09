<?php

interface Notification
{
    public function send($message);
}

class EmailNotification implements Notification
{
    public function send($message)
    {
        echo "Sending Email: $message\n";
    }
}

class SMSNotification implements Notification
{
    public function send($message)
    {
        echo "Sending SMS: $message\n";
    }
}

class PushNotification implements Notification
{
    public function send($message)
    {
        echo "Sending Push Notification: $message\n";
    }
}

class NotificationFactory
{
    public static function create($type)
    {
        switch ($type) {
            case 'email':
                return new EmailNotification();
            case 'sms':
                return new SMSNotification();
            case 'push':
                return new PushNotification();
            default:
                throw new Exception("Notification type '$type' is not recognized.");
        }
    }
}

try {
    $notificationType = 'email';
    $notification = NotificationFactory::create($notificationType);
    $notification->send("Hello via Email!");

    $notificationType = 'sms';
    $notification = NotificationFactory::create($notificationType);
    $notification->send("Hello via SMS!");

    $notificationType = 'push';
    $notification = NotificationFactory::create($notificationType);
    $notification->send("Hello via Push Notification!");
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}
