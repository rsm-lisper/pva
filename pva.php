<?php

namespace pva;

/**
 * @param callable $predicate
 * @param mixed $arg0
 * @param mixed ...$args
 * @return bool
 */
function every ($predicate, $arg0, ...$args) { return
        (count ($args) === 0 ? $predicate ($arg0) === true :
         ($predicate ($arg0) === true ? every ($predicate, array_shift ($args), ...$args) :
          false)) ;}


/**
 * @param callable $predicate
 * @param mixed $arg0
 * @param mixed ...$args
 * @return bool
 */
function some ($predicate, $arg0, ...$args) { return
        (count ($args) === 0 ? $predicate ($arg0) === true :
         ($predicate ($arg0) === true ? true :
          some ($predicate, array_shift ($args), ...$args))) ;}


/**
 * @param callable $predicate
 * @param mixed $arg0
 * @param mixed ...$args
 * @return bool
 */
function none ($predicate, $arg0, ...$args) { return
        (count ($args) === 0 ? $predicate ($arg0) === false :
         ($predicate ($arg0) === false ? none ($predicate, array_shift ($args), ...$args) :
          false)) ;}
