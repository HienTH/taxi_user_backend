<?php
class Promotion extends Config {

    private $table_name = "Promotion";

    public function __construct() {
		parent::__construct();
	}

    public function readAllOneUser () {
        $notSeenList = $this->readAll_notSeen();
        
        // het han su dung
        $query = "SELECT
                                        *
                                FROM
                                        " . $this->table_name . "
                WHERE timeTo < now() AND userID=?"; // ORDER BY time DESC

                $stmt = $this->conn->prepare($query);
                $stmt->bindParam(1, $this->userID);
                $stmt->execute();

                $all_list = array();

                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $all_list[] = $row;
        }

        $total = count($notSeenList);
        $this->all_list = array('total'=>$total, 'use'=>$notSeenList,
         'notUse'=>$all_list);
        return $this->all_list;
    }

    // con han su dung
    public function readAll_notSeen () {
        $query = "SELECT
                                    *
                                FROM
                                        " . $this->table_name . "
                                WHERE timeTo >= now() AND userID=?";

                $stmt = $this->conn->prepare($query);
                $stmt->bindParam(1, $this->userID);
                $stmt->execute();

                $all_list = array();

                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $all_list[] = $row;
        }
        return $all_list;
    }

    public function readOne () {
        $query = "SELECT
                    *
                FROM
                    " . $this->table_name . "
                WHERE id = " . $this->id . "";
        $stmt = $this->conn->prepare($query);

        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return ($row ? $row : null);
    }

}

 ?>
