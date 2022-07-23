<?php

class Media
{
    private $dbh;

    public function setDriver(\PDO $dbh)
    {
        $this->dbh = $dbh;
    }

    public function save(
        $date, $explanation, $hdurl, $media_type, $service_version, $title, $url
    )
    {
        $sql = "
        INSERT INTO `nasa-image`
            (date, explanation, hdurl, media_type, service_version, title, url)
        VALUES
            (:date, :explanation, :hdurl, :media_type, :service_version, :title, :url);";

        $sth = $this->dbh->prepare($sql);

        return $sth->execute(array(
            ':date' => $date,
            ':explanation' => $explanation,
            ':hdurl' => $hdurl,
            ':media_type' => $media_type,
            ':service_version' => $service_version,
            ':title' => $title,
            ':url' => $url
        ));

    }

    public function getRandomRecord()
    {
        $sql="SELECT ROUND(RAND() * ( SELECT MAX(`id`) FROM  `nasa-image`)) AS `id`";
       $sth=$this->dbh->query($sql);
       $id=$sth->fetchAll(PDO::FETCH_ASSOC);
       $sqlRandImage="SELECT * FROM `nasa-image` WHERE `id` = :id";
       $sth=$this->dbh->prepare( $sqlRandImage);
       $sth->bindParam(':id',$id[0]['id'],PDO::PARAM_INT);
       $sth->execute();
       return $sth->fetchAll(PDO::FETCH_ASSOC);
    }
}