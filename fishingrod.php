<?php
    require_once("dbcontroller.php");
    class FishingRod
    {
        private $fishingrod=[];
        public function __construct()
        {
            $query ="SELECT fr_ID, name FROM fishingrod";
            $dbvez=new DBController();
            $this->fishingrods=$dbvez->executeSelectQuery($query);
            $dbvez->closeDB();
        }
        public function getAllFishingRods()
        {
            return $this->fishingrod;
        }
        public function getFishingRodById($RodsId)
        {
            $query="SELECT fr_ID, name FROM fishingRod WHERE fr_ID=".$RodsId;
            $dbvez=new DBController();
            $this->fishingrod=$dbvez->executeSelectQuery($query);
            $dbvez->closeDB();
            return $this->fishingrod;
        }
        public function getFishingRodByType($TypeId)
        {
            $query= "SELECT fr_ID, name FROM fishingrod INNER JOIN type ON fishingrod.type_ID=type.t_id WHERE type.m_name='".$TypeId."'";
            $dbvez=new DBController();
            $this->fishingrod=$dbvez->executeSelectQuery($query);
            $dbvez->closeDB();
            return $this->fishingrod;
        }


    }
    


?>