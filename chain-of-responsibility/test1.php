<?php 


    interface downloadApp{

       public  function setNext(downloadApp $downloadApp): downloadApp;
       public  function handle($request): ?string;
    }


    abstract class abstractHandler implements downloadApp{
        private $nextHandler;
        public function setNext(downloadApp $downloadApp): downloadApp
        {
            return $downloadApp;
        }

        public function handle($request): ?string{
            if(($this->nextHandler)){
               return $this->nextHandler->handle($request);
            }
            else{
                return null;
            }
        }
    } 

    class AccessWeb  extends  abstractHandler{

        public function handle($request): ?string
        {
            if($request=="acccess the website")
            {
                return "we has request ". $request."\n";
            }
            else
            {
                return parent::handle($request);
            }
        }
    }
    class  download  extends abstractHandler{

        public function handle($request): ?string
        {

            if($request=="download the application")
            {

                return "we has request ". $request."\n";
            }
            else
            {

                return parent::handle($request);
            }
        }
    }


    class install extends abstractHandler{

        public function handle($request): ?string
        {
            if($request=="install")
            {

                return "we has request ".$request."\n";
            }
            else
            {
                return parent::handle($request);
            }
        }
    }
    class runApp extends abstractHandler{

        public function handle($request): ?string
        {
            if($request=="run application")
            {

                return "we has request ".$request."\n";
            }
            else
            {
                return parent::handle($request);
            }
        }
    }

    function clientCode(downloadApp $downloadApp)
    {
        $array=["acccess the website","download the application","install","run application"];
        foreach($array as $act)
        {
            echo"client want to ".$act."\n";

            $result=$downloadApp->handle($act);

            if($result)
            {

                echo" ". $result;
            }
            else
            {
                echo "no request to ".$act."\n";
                
            }
        }
    }
    $AccessWeb = new AccessWeb();
    $download = new download();
    $install = new install();
    $runApp= new runApp();
    $AccessWeb->setNext($download)->setNext($install)->setNext($runApp);
    echo"access the website->download->install->run app"."\n"; 
    clientCode($install);



