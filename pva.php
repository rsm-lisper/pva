<?php

namespace pva;

function every (callable $predicate, mixed $arg0, ...$args) { return
        (count ($args) === 0 ? $predicate ($arg0) === true :
         ($predicate ($arg0) === true ? every ($predicate, array_shift ($args), ...$args) :
          false)) ;}


function some (callable $predicate, mixed $arg0, ...$args) { return
        (count ($args) === 0 ? $predicate ($arg0) === true :
         ($predicate ($arg0) === true ? true :
          some ($predicate, array_shift ($args), ...$args))) ;}


function none (callable $predicate, mixed $arg0, ...$args) { return
        (count ($args) === 0 ? $predicate ($arg0) === false :
         ($predicate ($arg0) === false ? none ($predicate, array_shift ($args), ...$args) :
          false)) ;}
