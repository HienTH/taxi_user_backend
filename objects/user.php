<?php
class User extends Config {

    private $table_name = "User";

    public function __construct() {
		parent::__construct();
	}

    public function create () {
        //write query
			$query = "INSERT INTO
					" . $this->table_name . "
				SET
					username = ?, password = ?, name = ?, phone = ?, address = ?";

		$stmt = $this->conn->prepare($query);

		// posted values
        $this->username = htmlspecialchars(strip_tags($this->username));
        $this->password = hash('sha256', $this->password);
        $this->name = htmlspecialchars(strip_tags($this->name));
        $this->phone = htmlspecialchars(strip_tags($this->phone));
        $this->address = htmlspecialchars(strip_tags($this->address));

        // bind parameters
		$stmt->bindParam(1, $this->username);
        $stmt->bindParam(2, $this->password);
        $stmt->bindParam(3, $this->name);
        $stmt->bindParam(4, $this->phone);
        $stmt->bindParam(5, $this->address);

        // execute the query
		if ($stmt->execute()) {
			return true;
		} else
			return false;
    }

    public function readOneByID () {
            $query = "SELECT
                        *
                    FROM
                        " . $this->table_name . "
                    WHERE id = ?";
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(1, $this->id);

            $stmt->execute();
            $row = $stmt->fetch(PDO::FETCH_ASSOC);

            unset($row['password']);
            // set values
            if ($row['id']) {
                $this->id = $row['id'];
                $this->username = $row['username'];
                $this->name = $row['name'];
                $this->phone = $row['phone'];
                $this->address = $row['address'];
            }

            return ($row['id'] ? $row : null);
        }
}

 ?>
