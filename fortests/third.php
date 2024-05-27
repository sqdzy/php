<?php 
interface CalculateSquare
{
    public function getSquare(): float;
}

class Rectangle implements CalculateSquare
{
    private $width;
    private $height;

    public function __construct(float $width, float $height)
    {
        $this->width = $width;
        $this->height = $height;
    }

    public function getSquare(): float
    {
        return $this->width * $this->height;
    }
}

class Circle
{
    private $radius;

    public function __construct(float $radius)
    {
        $this->radius = $radius;
    }

    public function getSquare(): float
    {
        return pi() * $this->radius ** 2;
    }
}

function calculateSquare($object)
{
    if ($object instanceof CalculateSquare) {
        $square = $object->getSquare();
        $className = get_class($object);
        echo "Площадь объекта класса $className: $square" . PHP_EOL;
    } else {
        $className = get_class($object);
        echo "Объект класса $className не реализует интерфейс CalculateSquare." . PHP_EOL;
    }
}

$rectangle = new Rectangle(5, 10);
$circle = new Circle(3);

calculateSquare($rectangle);
calculateSquare($circle);
?>