<?php

/**
 * Employee model class
 */
class Employee
{
    /**
     * DB driver instance
     *
     * @var $dbh \PDO Databas
     */
    private $dbh;

    /**
     * Set low level connectiondriver instance
     *
     * @param \PDO $dbh
     * @return void
     */
    public function setDriver(\PDO $dbh)
    {
        $this->dbh = $dbh;
    }

    /**
     * Save employee info
     *
     * @param string $birth_date
     * @param string $first_name
     * @param string $last_name
     * @param string $gender
     * @param string $hire_date
     * @return boolean
     */
    public function save($birth_date, $first_name, $last_name, $gender, $hire_date)
    {
        $sql = "
            INSERT INTO employees 
                (emp_no, first_name, last_name, gender, birth_date, hire_date)
            VALUES
                (:emp_no, :first_name, :last_name, :gender, :birth_date, :hire_date)";

        $sth = $this->dbh->prepare($sql);

        return $sth->execute(array(
            ':emp_no' => $this->getMaxExistedId(),
            ':first_name' => $first_name,
            ':last_name' => $last_name,
            ':gender' => $gender,
            ':birth_date' => $birth_date,
            ':hire_date' => $hire_date
        ));
    }

    /**
     * Get max employee ID
     *
     * @return int
     */
    private function getMaxExistedId()
    {
        $sql = "SELECT MAX(`emp_no`) AS `max_id_num` FROM employees";
        
        $sth = $this->dbh->query($sql);
        $arr = $sth->fetch(\PDO::FETCH_ASSOC);
        
        return $arr['max_id_num'] + 1;
    }
}