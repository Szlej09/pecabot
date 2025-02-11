<?php
require_once("fishingrodrestkezelo.php");
$view="";
if (isset($_GET["view"])) {
    $view=$_GET["view"];
}
switch ($view) 
{
    case "all":
        $fishingrodrest=new Fishingrodrestkezelo();
        $fishingrodrest->getAllFRod();
        break;
        case "single":
            $fishingrodrest=new Fishingrodrestkezelo();
            $fishingrodrest->getRodById($_GET["id"]);
            break;
            case "tipus":
                $fishingrodrest=new Fishingrodrestkezelo();
                $fishingrodrest->getRodByType($_GET["tid"]);
                break;
                default:
                $fishingrodrest=new Fishingrodrestkezelo();
                $fishingrodrest->getFault();

}