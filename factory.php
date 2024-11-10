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

class NotificationService
{
    private $notification;

    public function __construct(Notification $notification)
    {
        $this->notification = $notification;
    }

    public function notify($message)
    {
        $this->notification->send($message);
    }
}

try {
    $emailNotification = new EmailNotification();
    $notificationService = new NotificationService($emailNotification);
    $notificationService->notify("Hello via Email!");

    $smsNotification = new SMSNotification();
    $notificationService = new NotificationService($smsNotification);
    $notificationService->notify("Hello via SMS!");

    $pushNotification = new PushNotification();
    $notificationService = new NotificationService($pushNotification);
    $notificationService->notify("Hello via Push Notification!");
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}
