<?php

class HomeController
{
    private $model;

    /**
     * Init constructor with a necessary services.
     */
    public function __construct()
    {
        try {
            // craa db connection driver instance
            $dbh = Dbconn::getMySQL(
                MYSQL_DSN, MYSQL_USER, MYSQL_PASS
            );
        } catch (\PDOException $e) {
            $error = 'Could not connect to database: '.$e->getMessage();
            require_once VIEWS_DIR . '/error.php';
            exit;  
        }

        // 1. create a model class instance
        $this->model = new Employee();

        // 2. set low level driver
        $this->model->setDriver($dbh);
    }


    /**
     * Display a form to add employee information
     *
     * @return void
     */
    public function home()
    {
        require_once VIEWS_DIR . '/home.php';
    }

    /**
     * Process a form and save it to the database.
     *
     * @return void
     */
    public function rezult()
    {
        
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $error = array();
            
            // input validation.
            if (!$_POST['first_name']) {
                $error[] = 'Дані про first_name є обов’зковими!';
            }
            if (!$_POST['last_name']) {
                $error[] = 'Дані про last_name є обов’язковими!';
            }
            if (!$_POST['birth_date']) {
                $error[] = 'Дані про birth_date є обов’язковими!';
            }
            if (!$_POST['hire_date']) {
                $error[] = 'Дані про hire_date є обов’язковими!';
            }

            $gender = ($_POST['gender'] == 'Male')?  'M':'F';
        
            if (!$error) {
                $birth_date = date("Y-m-d", strtotime($_POST['birth_date']));
                $hire_date = date("Y-m-d", strtotime($_POST['hire_date']));

                $saved = $this->model->save(
                    $birth_date,
                    $_POST['first_name'],
                    $_POST['last_name'],
                    $gender,
                    $hire_date
                );

                if ($saved) {
                    require_once VIEWS_DIR . '/rezult.php';
                } else {
                    require_once VIEWS_DIR . '/error.php';
                }
            } else {
                require_once VIEWS_DIR . '/error.php';
            }
        }
    }
}
