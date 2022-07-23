<?php 

/**
 * Домашнє завдання:
 * Реалізувати виведення рандомного фото на сторіку.
 * Для цього вам необхідно: 
 *  1) додати новий метод у модель Media.php, який буде отримувати з БД рандомний запис
 *      SQL-запит: SELECT ROUND(RAND() * ( SELECT MAX(id) FROM  table_name)) AS id; 
 * 
 *  2) додати новий метод у контролер MediaController, home чи index
 *      2.1) в контролері викликайте відповідний метод моделі 
 *      2.2) та виводьте результат на головну сторінку
 */
class MediaController
{
    private $model;

    public function __construct()
    {
        try {
            // create db connection driver instance
            $dbh = Dbconn::getMySQL(
                MYSQL_DSN, MYSQL_USER, MYSQL_PASS
            );
        } catch (\PDOException $e) {
            $error = 'Could not connect to database: '.$e->getMessage();
            require_once VIEWS_DIR . '/error.php';
            exit;  
        }

        // 1. create a model class instance
        $this->model = new Media();

        // 2. set low level driver
        $this->model->setDriver($dbh);
    }

    public function index()
    {
        $mas=$this->model->getRandomRecord();
       $this->render(['image'=>$mas]);
    }

    public function save()
    {
        $media = $this->loadData();

        foreach ($media as $item) {
            $this->model->save(
                $item['date'],
                $item['explanation'],
                $item['hdurl'],
                $item['media_type'],
                $item['service_version'],
                $item['title'],
                $item['url']
            );
        }

        require_once VIEWS_DIR . '/saved.php';
    }

    private function loadData()
    {
        return json_decode(
            file_get_contents(NASA_APOD_API_URL),
            true
        );
    } 
    private function render($data=[]){
        extract($data);
        require_once VIEWS_DIR."/nasaImage.php";
    }
}