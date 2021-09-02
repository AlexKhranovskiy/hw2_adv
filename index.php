<?php
class MyColor
{
    private $red;
    private $green;
    private $blue;

    private $errorBag = [
    'red' => [],
    'green' => [],
    'blue' => []
    ];
    private function setRedValue(int $redValue):void
    {
        if ($redValue < 0) {
            $this->errorBag['red'] [] = 'Значение красного не должно быть меньше нуля';
        }
        if ($redValue > 255) {
            $this->errorBag['red'] [] = 'Значение красного не должно быть больше 255';
        }
        $this->red = $redValue;
    }
    private function setGreenValue(int $greenValue):void
    {
        if ($greenValue < 0) {
            $this->errorBag['red'] [] = 'Значение зеленого не должно быть меньше нуля';
        }
        if ($greenValue > 255) {
            $this->errorBag['red'] [] = 'Значение зеленого не должно быть больше 255';
        }
        $this->green = $greenValue;
    }
    private function setBlueValue(int $blueValue):void
    {
        if ($blueValue < 0) {
            $this->errorBag['red'] [] = 'Значение синего не должно быть меньше нуля';
        }
        if ($blueValue > 255) {
            $this->errorBag['red'] [] = 'Значение синего не должно быть больше 255';
        }
        $this->blue = $blueValue;
    }

    public function getRedValue():int
    {
        return $this->red;
    }
    public function getGreenValue():int
    {
        return $this->green;
    }
    public function getBlueValue():int
    {
        return $this->blue;
    }

    public function __construct(int $_red, int $_green, int $_blue)
    {
        $this->setRedValue($_red);
        $this->setGreenValue($_green);
        $this->setBlueValue($_blue);
        $this ->checkErrors();
    }
    private function checkErrors():void
    {
        $errorsCounter = count(
            $this->errorBag['red'] +
            $this->errorBag['green'] +
            $this->errorBag['blue']
        );
        if ($errorsCounter > 0) {
            foreach ($this->errorBag as $item){
                foreach ($item as $item_item )
                echo $item_item.'<br>';
            }
            exit();
        }
    }

    public function View(){
        return 'red= '.$this->getRedValue().' green = '.$this->getGreenValue().' blue = '.$this->getBlueValue();
    }

}

$color = new MyColor(200, 200, 200);
echo $color->View();

//$mixedColor = $color->mix(new Color(100, 100, 100));
//$mixedColor->getRed(); // 150
//$mixedColor->getGreen(); // 150
//$mixedColor->getBlue(); // 150
//
//if (!$color->equals($mixedColor)) {
//    echo 'Цвета не равні';
//}
?>