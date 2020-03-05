<?php

class Body
{
    private $items;


    public function __construct()
    {
        $this->setBody([]);
    }


    public function getItems(){
        return $this->items;
    }
    private function setBody(array $items){
        $this->items = $items;
        return $this;
    }

    public function appendBody($value){

        if(is_array($value))
            foreach($value as $item)
                $this->appendBody($item);
        else{
            $items = $this->getItems();
            $items[] = $value;
            print_r($items);
            return $this->setBody($items);
        }
        return $this;
    }
    public function prependBody($value){
        //if($value instanceof Body)
        //  return $this->prependBody($value->getItems());

        if(is_array($value)){
            $keys = array_keys($value);
            for($i = count($keys) - 1; $i >= 0; $i--){
                $this->prependBody($value[$keys[$i]]);
            }
        }
        else{
            $items = $this->getItems();
            array_unshift($items, $value);
            return $this->setBody($items);
        }

        return $this;
    }
    public function __toString():string{
        return implode($this->getItems());
    }
}