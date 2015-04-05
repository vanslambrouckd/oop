<?php

class GoogleDocs
{
    public function login()
    {

    }

    public function getDocumentsList()
    {
        return [
            'google item 1',
            'google item 3',
            'google item 3'
        ];
    }

    public function getDocumentsByType($type)
    {

    }
}

class Office365
{
    public function connect()
    {

    }

    public function authorize()
    {

    }

    public function getList()
    {
        return [
            'office item 1',
            'office item 3',
            'office item 3'
        ];
    }

    public function getDocsByType($type)
    {

    }
}

interface DocManager
{
    public function login();

    public function getDocumentsList();

    public function getDocumentByType($type);
}

//zorgen dat Office365 class compatibel is met google docs class via Docmanager interface:
class Office365Adapter implements DocManager
{
    private $office;

    public function __construct(Office365 $office)
    {
        $this->office = $office;
    }

    public function login()
    {
        $this->office->connect();
        $this->office->authorize();
    }

    public function getDocumentsList()
    {
        return $this->office->getList();
    }

    public function getDocumentByType($type)
    {
        $this->office->getDocsByType($type);
    }
}

$docs = new GoogleDocs();
$docs->login();
$list = $docs->getDocumentsList();
var_dump($list);

$office = new Office365Adapter(new Office365());
$office->login();
$list = $office->getDocumentsList();
var_dump($list);