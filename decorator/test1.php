<?php 


    interface UIImages{
        function Apply();
        function showCheck();

    }

    class FileImages implements UIImages{

        public $fileName;
        public function FileImages($fileNameInput){
            $this->fileName=$fileNameInput;
        }
        public function Apply()
        {
            echo  "file name will edit: ".$this->fileName;
        }
        function showCheck()
        {

        }

    }

    class FileImagesDecorator implements UIImages{

        protected $FileImagesDecorator;

        public function __construct(UIImages $UIImages)
        {
            $this->FileImagesDecorator=$UIImages;
        }

        public function Apply()
        {
            return $this->FileImagesDecorator->Apply();
        }

        public function showCheck()
        {


        }
    }


    class FilterDecorator extends FileImagesDecorator

    {
        public function Apply()
        {
            echo " FillterDecorator". parent:: Apply()."\n";
        }
        public function showCheck()
        {

        }
    }
    class BaseDecorator extends FileImagesDecorator

    {
        public function Apply()
        {
            echo " BaseDecorator". parent::Apply()."\n";
        }
        public function showCheck()
        {
            
        }
    }

    class ResizeDecorator extends FileImagesDecorator

    {
        public function Apply()
        {
            echo " ResizeDecorator".parent:: Apply()."\n";
        }
        public function showCheck()
        {
            
        }
    }

    function ClientCode(UIImages $file)

    {
        $file->Apply();
    }


    $newImages= new FileImages("abc.jpg");

    $resizeImg= new BaseDecorator($newImages);
    ClientCode($resizeImg);

