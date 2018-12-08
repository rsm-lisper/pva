<?php

require 'lib/ppt/ppt.php';
require 'pva.php';

use function ppt\test_all, ppt\exit_nicely,
    pva\every, pva\some, pva\none ;


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

exit_nicely (test_all ($pva_test_specs));
