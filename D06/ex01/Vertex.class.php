<?php
Class Vertex {
    static $verbose = false;
    private $_x;
    private $_y;
    private $_z;
    private $_w;
    private $_color;

    function static doc() {
        echo file_get_contents("Vertex.doc.txt");
    }
    
    function __toString() {
        return sprintf("");
    }
}

?>