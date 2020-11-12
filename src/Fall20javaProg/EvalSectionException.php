<?php

class EvalSectionException extends Exception {
    public function __construct($m) {
        echo "Exception: ". $m .PHP_EOL;
    }
}
?>
