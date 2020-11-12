<?php

abstract class TokenType{
    const LBRACKET = 0;
    const RBRACKET = 1;
    const LSQUAREBRACKET = 2;
    const RSQUAREBRACKET = 3;
    const EQUAL = 4;
    const COLON = 5;
    const OUTPUT = 6;
    const SWITCH = 7;
    const CASE = 8;
    const BREAK = 9;
    const DEFAULT = 10;
    const ID = 11;
    const INT = 12;
    const STRING = 13;
    const EOF = 14;
    const OTHER = 15;
}

?>