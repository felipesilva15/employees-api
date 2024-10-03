<?php

namespace App\Data\System;

class ApiErrorDTO
{
    public bool $result;
    public string $message;

    public function __construct(bool $result = false, string $message) {
        $this->result = $result;
        $this->message = $message;
    }
}