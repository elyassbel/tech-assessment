<?php

namespace Manager;

class AppManager
{
    const COOKIE_NAME = 'client';
    const CLIENT_A = 'clienta';
    const CLIENT_B = 'clientb';
    const CLIENT_C = 'clientc';

    private string $client;

    public function __construct($client)
    {
        $this->client = $client;
    }

    public function updateCookie(): void
    {
        if (!$this->isValidClient()) {
            $this->clearCookie();

            return;
        }

        setcookie(self::COOKIE_NAME, $this->client);
    }

    public function getAjaxFile($module = 'cars', $script = 'ajax')
    {
        $file = 'customs/'.strtolower($this->client).'/modules/'.$module.'/'.$script.'.php';

        if (!$this->isValidClient() || !file_exists($file)) {
            return false;
        }

        return $file;
    }

    private function isValidClient(): bool
    {
        return in_array($this->client, [self::CLIENT_A, self::CLIENT_B, self::CLIENT_C]);
    }

    private function clearCookie(): void
    {
        $name = self::COOKIE_NAME;
        if (isset($_COOKIE[$name])) {
            unset($_COOKIE[$name]);
            setcookie($name, '', -1);
        }
    }
}
