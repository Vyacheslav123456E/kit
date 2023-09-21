<?php


class Products
{
    private $id;
    private $name;

    public function __construct($id = null, $name = null)
    {
        $this->id = $id;
        $this->name = $name;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function toJson()
    {
        return json_encode(array(
            'id' => $this->getId(),
            'name' => $this->getName()
        ));
    }

    public function toAssoc()
    {
        return array(
            'id' => $this->getId(),
            'name' => $this->getName()
        );
    }
}