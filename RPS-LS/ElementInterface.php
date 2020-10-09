<?php

interface ElementInterface{
    public function beats(ElementInterface $element):Result;
    public function returnImageName():string;

}