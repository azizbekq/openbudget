<?php

require __DIR__.'/opens.php';

$dublix = new MobVote("894e076d-986d-4085-ad50-2890f166d248", 31);
$getCaptch = $dublix->getCaptch();

$captchaKey = $getCaptch['captchaKey'];
$dublix->requestVote(998901234567,$captchaKey,7);


