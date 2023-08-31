# openbudget

# Openbudget.uz platformasini avtomatlashtrish uchun mahsus kod


```php
<?php

require __DIR__ . '/opens.php';

$project_id = "894e076d-986d-4085-ad50-2890f166d248"; // loyiha id raqami
$project_number = 31; // loyiha maxsus raqami

$dublix = new MobVote($project_id, $project_number);
var_dump($dublix->getCaptch()); // captcha rasmini olish


```
