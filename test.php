<?php

require 'pva.php' ;


/**
 * @param mixed $a
 * @param mixed $b
 * @return bool
 */
function eq ($a, $b) { return
        $a === $b ;}


/**
 * @param mixed $a
 * @param mixed $b
 * @return bool
 */
function equal ($a, $b) { return
        $a == $b ;}


/**
 * @param mixed $a
 * @return bool
 */
function not ($a) { return
        ! $a ;}


/**
 * @param mixed $a
 * @param mixed $b
 * @return bool
 */
function neq ($a, $b) { return
        ! eq ($a, $b) ;}


/**
 * @param mixed $a
 * @param mixed $b
 * @return bool
 */
function not_equal ($a, $b) { return
        ! equal ($a, $b) ;}


/**
 * @param bool $a
 * @return string
 */
function format_bool ($a) { return
        $a ? 'TRUE' : 'FALSE' ;}


/**
 * @param string $desc
 * @param callable $predicate
 * @param mixed $a
 * @param mixed $b
 * @return null
 */
function test ($desc, $predicate, $a, $b) {
    print ('* '. $desc .': '. format_bool ($predicate ($a, $b)) ."\n") ;}


/**
 * @param array $test_specs
 * @return null
 */
function test_all ($test_specs) {
    foreach ($test_specs
             as $name => $spec) {
        test ($name, $spec[0], $spec[1], $spec[2]) ;}}

$self_test_specs = [
    'self-check eq 1' => ['eq', 1, 1],
    'self-check eq 2' => ['eq', eq(1, 1.0), false],
    'self-check eq 3' => ['eq', eq(0, "0"), false] ];

test_all ($self_test_specs);

$pve_test_specs = [
    'every 1' => ['eq', pva\every ('is_int', 1, 2, 3), true],
    'every 2' => ['eq', pva\every ('is_int', 1.0), false],
    'some 1' => ['eq', pva\some ('is_int', 1.1), false],
    'some 2' => ['eq', pva\some ('is_int', 1), true],
    'some 3' => ['eq', pva\some ('is_int', 1.1, 1.2, 1), true],
    'some 4' => ['eq', pva\some ('is_int', "0", 1.1, "nie", []), false],
    'some 5' => ['eq', pva\some ('is_int', "0", 1.1, "nie", [], 100), true] ];

test_all ($pve_test_specs) ;
