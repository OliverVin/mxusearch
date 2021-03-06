<?php
namespace Antsfree\Mxusearch\Sdk;

class XSTokenizerXlen implements XSTokenizer
{
    private $arg = 2;
    public function __construct($arg = null)
    {
        if ($arg !== null && $arg !== '') {
            $this->arg = intval($arg);
            if ($this->arg < 1 || $this->arg > 255) {
                throw new XSException('Invalid argument for ' . __CLASS__ . ': ' . $arg);
            }
        }
    }
    public function getTokens($value, XSDocument $doc = null)
    {
        $terms = array();
        for ($i = 0; $i < strlen($value); $i += $this->arg) {
            $terms[] = substr($value, $i, $this->arg);
        }
        return $terms;
    }
}