<?php
class Reserve
{
    private $conn;
    private $tableName = "reserve";
    public $reserveId;
    public $idRoom;
    public $type;
    public $date;
    public $dateTo;
    public function __construct($db){
    $this->conn = $db;
}
    function insertData($fields, $data)
    {       
        $fieldsValues = implode(',',$fields);
        $element1 = $data['id_room'];
        $element2 = $data['date'];
        $element3 = $data['date_to'];
        if($element2 < $element3)
        {     
            $sql="INSERT into". " ".$this->tableName." (".$fieldsValues.") VALUES ('$element1','$element2','$element3')";
            return $sql;
        }
    }

    function update($fieldsValues, $dataValues) 
    {
        $update = "";
        $count = 0;
        foreach($fieldsValues as $field) 
        {
            $count += 1;
            $update .=  $field. "='". $dataValues[$field]. "'";
            if($count < count($fieldsValues)) 
            {
                $update.= ",";
            }
        }
        $sql = "UPDATE ".$this->tableName." SET ".$update;    
        return $sql;
    }
    
    function delete($data) 
    {
        $query = "DELETE FROM " . $this->tableName . " WHERE reserve_id = ".$data. "";
        $statement = $this->conn->prepare($query);
        $this->reserveId = htmlspecialchars(strip_tags($this->reserveId));
        $statement->bindParam(1, $this->reserveId);
        if ($statement->execute()) {
            return true;
        }
        return false;
    }

}