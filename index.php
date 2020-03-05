<?php

declare(strict_types=1);

include "helpers.php";

echo Tag::a()->appendBody("Hello");

$html = Tag::html()->appendAttribute("lang", "en");

