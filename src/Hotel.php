<?php

namespace OnPHPoint\WebtCoreViewsInMvc;


class Hotel {
	public string $stars;
    public function __construct(public string $name, public string $description, int $stars) {
		$this->stars = str_repeat("⭐", $stars);
    }
}