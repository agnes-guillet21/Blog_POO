<?php

namespace services;

/***
 * Trait errorNotifications
 * @package services
 * trait personnalisable
 */
trait errorNotifications
{
    public function setErrorNotification(string $key, string $message): void
    {
        $_SESSION['errorNotifications'][$key] = $message;
    }


    private function getErrorNotification(string $key): string
    {
        $message = $_SESSION['errorNotifications'][$key];
        unset($_SESSION['errorNotifications'][$key]);
        return $message;
    }

    public function checkErrorsNotification(string $key): bool
    {
        if (!empty($_SESSION['errorNotifications'][$key])) {
            return true;
        }
        return false;
    }

    public function getInvalidFeedback(string $key): string
    {
        $content = self::checkErrorsNotification($key) ? self::getErrorNotification($key) : '';
        return '<small class="text-danger">' . $content . '</small>';
    }

}

