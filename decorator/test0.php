<?php

    interface DataSource{
        function writeData();
        function readData();
    }
    
    class FileDataSource implements DataSource{

        public $_fileName;

        public function FileDataSource($fileNameInput){
            $this->_fileName=$fileNameInput;
        }

        public function writeData(){
            echo"fileName writting Dataa".$this->_fileName;
        }

        public function readData(){

        }

    }


    class DataSourceDecorator implements DataSource{

        public $wrappee;
        
        public function __construct(DataSource $DataSource)
    {
        $this->wrappee = $DataSource;
    }

        public function writeData(){
            // return $this->wrappee->writeData();

        }
            
        public function readData()
        {
            $this->wrappee->readData();

        }
    }


    class EncryptionDecorator extends DataSourceDecorator{

        

        public function writeData()
        {
            return "EncryptionDecorator(".parent::writeData().")";
        }

        public function readData()
        {
            
        }


    }
    class CompressionDecorator extends DataSourceDecorator{

        public function  writeData()
        {
            echo "CompresstionDecorator(".parent::writeData().")";
            
        }

        public function readData()
        {
            
        }

        
    }

    function clientCode(DataSource $file){
        echo"result".$file->writeData("ss");
    }


    $file=new FileDataSource("xuankhai.txt");


    $encryptionDecorator=new EncryptionDecorator($file);
    // $compressionDecorator=new CompressionDecorator($file);

    clientCode($encryptionDecorator);
