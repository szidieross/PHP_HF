<?php

class ArrayManipulator
{
    private $data = [];

    public function __construct(array $data)
    {
        $this->data = $data;
    }

    public function ___get($key)
    {
        return $this->data[$key];
    }

    public function __set($key, $value)
    {
        $this->data[$key] = $value;
    }

    public function __isset($key)
    {
        return isset($this->data[$key]);
    }

    public function __unset($key)
    {
        unset($this->data[$key]);
    }

    public function __toString()
    {
        return implode(', ', $this->data);
    }

    public function __clone()
    {
        $this->data = array_map(function ($item) {
            if (is_object($item) && method_exists($item, "__clone")) {
                return clone $item;
            } else {
                return $item;
            }
        }, $this->data);
    }
}

$am = new ArrayManipulator(["alma", "hhfghf", 7]);
echo "<pre>";

print $am;
print "<br/>";
print($am->___get(1));
$am->__set(7, "korte");
print "<br/>";
// print($am);
$am->alma = "szilva";
$am->alma = "barack";
var_dump($am);

$clonedAm = clone $am;
echo "cloned am <br/>";
var_dump($am === $clonedAm);
var_dump($clonedAm);

var_dump(isset($am));
unset($clonedAm);
var_dump(isset($clonedAm));

echo "</pre>";
?>