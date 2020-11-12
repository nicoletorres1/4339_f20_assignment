<?php
include_once('Token.php');
include_once('TokenType.php');

class Tokenizer {
    private $e = array();
    private $i;
    public $currentChar;

    public function __construct($s){
        $this->e = str_split($s);
        $this->i = 0;
    }

    public function nextToken(){

        while($this->i < count($this->e) && ctype_space($this->e[$this->i])){
            $this->i++;
        }

        if($this->i >= count($this->e)){
            return new Token(TokenType::EOF,"");
        }

        $inputString = "";
        while ( $this->i < count($this->e) && is_numeric($this->e[$this->i])) {
            $inputString .= $this->e[$this->i++];
        }

        if("" !== $inputString){
            return new Token(TokenType::INT,$inputString);
        }
        // check for ID or reserved word
        while ( $this->i < count($this->e) && ctype_alpha($this->e[$this->i])) {
            $inputString .= $this->e[$this->i++];
        }
        if ("" !== $inputString) {
            if ("output" == $inputString) {
                return new Token(TokenType::OUTPUT,"");
            }
            if ("switch" == $inputString) {
                return new Token(TokenType::SWITCH,"");
            }
            if ("case" == $inputString) {
                return new Token(TokenType::CASE,"");
            }
            if ("break" == $inputString) {
                return new Token(TokenType::BREAK, "");
            }
            if ("default" == $inputString) {
                return new Token(TokenType::DEFAULT,"");
            }
            return new Token(TokenType::ID, $inputString);
        }
        // We're left with strings or one character tokens
        switch ($this->e[$this->i++]) {
            case '{':
                return new Token(TokenType::LBRACKET,"{");
            case '}':
                return new Token(TokenType::RBRACKET,"}");
            case '[':
                return new Token(TokenType::LSQUAREBRACKET,"[");
            case ']':
                return new Token(TokenType::RSQUAREBRACKET,"]");
            case '=':
                return new Token(TokenType::EQUAL,"=");
            case ':':
                return new Token(TokenType::COLON,":");
            case '"':
                $value="";
                while ($this->i< count($this->e) && $this->e[$this->i]!='"'){
                    $c = $this->e[$this->i++];
                    if ($this->i >= count($this->e))
                        return new Token(TokenType::OTHER,"");
                    // check for escaped double quote
                    if ($c=='\\' && $this->e[$this->i]=='"'){
                        $c='"';
                        $this->i++;
                    }
                    $value .= $c;
                }
                $this->i++;
                return new Token(TokenType::STRING, $value);
            default:
                // OTHER should result in exception
                return new Token(TokenType::OTHER,"");
        }
    }
}
?>
