<?php

interface OutputInterface
{
    public function load(Array $data);
}

class JsonStringOutput implements OutputInterface
{
    public function load(Array $data){
        return json_encode($data);
    }
}

class SerializedOutput implements OutputInterface
{
    public function load(Array $data){
        return serialize($data);
    }
}

$data = [
    'david', 'delphine'
];

$json = new JsonStringOutput();
var_dump($json->load($data));

$ser = new SerializedOutput($data);
var_dump($ser->load($data));

class Client
{
    private $output;
    public function setOutput(OutputInterface $outputType){
        $this->output = $outputType;
    }
    public function loadOutput(Array $data){
        return $this->output->load($data);
    }
}

$client = new Client();
$client->setOutput(new JsonStringOutput());
$result = $client->loadOutput($data);
var_dump($result);

$client->setOutput(new SerializedOutput());
$result = $client->loadOutput($data);
var_dump($result);