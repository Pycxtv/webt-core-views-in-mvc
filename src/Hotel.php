<?php

namespace OnPHPoint\Hotel;

class Hotel {
    public function __construct(public string $name, public string $description, public int $stars) {}
}