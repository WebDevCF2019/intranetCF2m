<?php

namespace ;

class limageUpload
{    
    private $db;

    public function __construct(MyPDO $connect)
    {

        $this->db = $connect;
    }
}