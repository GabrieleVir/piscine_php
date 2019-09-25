<?php
Class Color {

    static $verbose = FALSE;
    int red;
    int green;
    int blue;

    function __constructor(array $kwargs) {
        if (array_key_exists('red', $kwargs) && array_key_exists('green', $kwargs) && array_key_exists('blue', $kwargs)) {
            $this->red = (int)$kwargs['red'];
            $this->blue = (int)$kwargs['blue'];
            $this->green = (int)$kwargs['green'];
        }
        else if (array_key_exists('rgb', $kwargs))
        {
            $this->red = ((int)$kwargs['rgb'] & 0xFF0000) >> 16;
            $this->green = ((int)$kwargs['rgb'] & 0x00FF00) >> 8;
            $this->blue = ((int)$kwargs['rgb'] & 0x0000FF);
        }
        printf("Color( red: %3d, green: %3d, blue: %3d)", $this->red, $this->green, $this->blue);
        if ($verbose == TRUE) {
            echo "constructed." . PHP_EOL;
        }
        else
            echo PHP_EOL;
    }

    function __destructor( array $kwargs) {
        if ($verbose == TRUE){
            printf("Color( red: %3d, green: %3d, blue: %3d)", $this->red, $this->green, $this->blue);
            echo "destructed." . PHP_EOL;
        }        
    }

    function __toString() {
        return sprintf("Color( red: %3d, green: %3d, blue: %3d)", $this->red, $this->green, $this->blue);
    }

    function add($other_col) {
        $this->red += $other_col->red;
        $this->green += $other_col->green;
        $this->blue += $other_col->blue;
    }

    function sub($other_col) {
        $this->red -= $other_col->red;
        $this->green -= $other_col->green;
        $this->blue -= $other_col->blue;
    }

    function mult() {
        $this->red *= $other_col->red;
        $this->green *= $other_col->green;
        $this->blue *= $other_col->blue;        
    }

    function static doc() {
        echo file_get_contents("Color.doc.txt");
    }
}

?>