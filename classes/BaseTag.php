<?php

include_once "Attributes.php";
include_once "Body.php";

abstract class BaseTag
{
    private $name;
    private $attrs;
    private $body;
    protected $isSelfClosing;

    private const Self_Closed = [
    'area', 'base', 'br', 'col', 'embed', 'hr', 'param', 'meta', 'source','track','wbr'
];

    public function __construct(string $name, array $attrs = [])
    {
        $this->name = $name;
        $this->attrs = new Attributes($attrs);
        $this->body = new Body();

        if(in_array($name, self::Self_Closed)){
            $this->isSelfClosing = true;
        }
    }

    public function selfClosing(){
        $this->isSelfClosing = true;
    }

    public function setAttribute($key,string $value = "null"){
        $this->attrs->setAttribute($key, $value);
        return $this;
    }
    public function setAttributes(array $attrs){
        foreach($attrs as $key => $value)
            $this->setAttribute($key, $value);
        return $this;
    }
    public function appendBody($value){
        $this->body->appendBody($value);
        return $this;
    }
    public function prependBody($value){
        $this->body->prependBody($value);
        return $this;
    }

    public function addClass(string $name){
        $this->setAttribute("class", $name);
        return $this;
    }

    public function appendAttribute($key,string $value = "null"){
        return $this->attrs->appendAttribute($key, $value);
    }
    public function prependAttribute($key,string $value = "null"){
        return $this->attrs->prependAttribute($key, $value);
    }

    public function __toString(){
        $str = "<{$this->name} {$this->attrs}";
        if($this->isSelfClosing)
            $str .= ">{$this->body}</{$this->name}>";
        else
            $str .= "/>";
        return $str;
    }


    public function appendTo(BaseTag $tag){
        $tag->appendBody($this);
        return $this;
    }
    public function prependTo(BaseTag $tag){
        $tag->prependBody($this);
        return $this;
    }
/*
    public function selfClosing(){
        $this->isSelfClosing = true;
    }

    public function addAttribute($key,string $value = "null"){
        $this->attrs[$key] = $value;
    }
    public function addAttributes(array $attrs){
        foreach($attrs as $key => $value)
        $this->addAttribute($key, $value);
    }
    public function appendBody($body){
        $this->body = $body . $this->body;
    }
    public function prependBody($body){
        $this->body = $this->body . $body;
    }
    public function getString(){
        $str = "";
        $str = "<{$this->name} ";
        foreach($this->attrs as $key=>$value){
            $str .= "{$key}='{$value}'";
        }
        $str .= ">";
        if($this->isSelfClosing)
            $str .= "{$this->body}</{$this->name}>";
        return $str;
    }
    public function addClass(string $name){
        addAttribute("class", $name);
    }

    public function appendAttribute($key,string $value = "null"){
        array_unshift($this->attrs[$key],$value);
    }
    public function prependAttribute($key,string $value = "null"){
        array_push($this->attrs[$key],$value);
    }*/
}