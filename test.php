<?php

require 'lib/ppt/ppt.php';
require 'pva.php';

use function rsm_lisper\ppt\test_all, rsm_lisper\exit_nicely,
    rsm_lisper\pva\every, rsm_lisper\pva\some, rsm_lisper\pva\none ;


$pva_test_specs = [
    ['every',
     ['is_int true', every ('is_int', 1, 2, 3), true],
     ['is_int false', every ('is_int', 1.0), false]],
    ['some',
     ['is_int false 1', some ('is_int', 1.1), false],
     ['is_int true 1', some ('is_int', 1), true],
     ['is_int true 3', some ('is_int', 1.1, 1.2, 1), true],
     ['is_int false 3', some ('is_int', "0", 1.1, "nie", []), false],
     ['is_int true 5', some ('is_int', "0", 1.1, "nie", [], 100), true]] ];

print (test_all ($pva_test_specs));
