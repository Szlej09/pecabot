<?php
require_once("restkezelo.php");
require_once("fishingrod.php");
class Fishingrodrestkezelo extends Restkezelo
{
     function getAllFRod()
     {
        $fishingrod=new FishingRod();
        $soradat=$fishingrod->getAllFishingRods();
        if (empty($soradat)) {
            $statusCode=404;
            $soradat=array("error"=>"Semmilyen pecabotot nem találtunk!");
        }
        else{
            $statusCode=200;
        }
        $this->sethttpFejlec($statusCode);
        $result["fishingRods"]=$soradat;
        $response=$this->encodeJson($result);
        echo $response;
    }

    function getRodById($id)
    {
        $fishingrod=new FishingRod();
        $soradat=$fishingrod->getFishingRodById($id);
        if (empty($soradat)) {
            $statusCode= 404;
            $soradat=array('error'=>'Nem találtunk semmilyen pecabotot erre az id-ra!');

        }
        else
        {
            $statusCode= 200;
        }
        $this->sethttpFejlec($statusCode);
        $result["fishingRodById"]=$soradat;
        $response=$this->encodeJson($result);
        echo $response;
    }
    function getRodByType($tid)
    {
        $fishingrod=new FishingRod();
        $soradat=$fishingrod->getFishingRodByType($tid);
        if (empty($soradat))
        {
            $statusCode= 404;
            $soradat=array('error'=>'Nem találtunk semmilyen pecabotot erre az id-ra!');
        }
        else{
            $statusCode= 200;
        }
        $this->sethttpFejlec($statusCode);
        $result["fishingRodByManufacturer"]=$soradat;
        $response=$this->encodeJson($result);
        echo $response; 
    }
    function getFault()
    {
        $statusCode=400;
        $this->sethttpFejlec($statusCode);
        $soradat=array('error'=>'Rossz kérés');
        $result["hiba"]=$soradat;
        $response=$this->encodeJson($result);
        echo $response;
    }

     function encodeJson($responsedata)
     {
        $jsonResponse=json_encode($responsedata);
        return $jsonResponse;
     }
}



?>