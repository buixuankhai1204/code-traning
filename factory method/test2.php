<?php
namespace RefactoringGuru\FactoryMethod\RealWorld;

abstract class SocialNetworkPoster{

    abstract public function  getSocialNetwork():SocialNetworkConnector;
    public function post($content):void{
        $network= $this->getSocialNetwork();
        $network->logIn();
        $network->createPost($content);
        $network->logOut();
    }
};
class FacebookPoster extends SocialNetworkPoster{
    private $login;
    private $password;
    public function __construct(String $login,String $password){
        $this->login= $login;
        $this->password= $password;
    }
    public function getSocialNetwork():SocialNetworkConnector{
        return new FacebookConnector($this->login,$this-> password);
    }
}
class LinkedInPoster extends SocialNetworkPoster
{
    private $email, $password;

    public function __construct(string $email, string $password)
    {
        $this->email = $email;
        $this->password = $password;
    }

    public function getSocialNetwork(): SocialNetworkConnector
    {
        return new LinkedInConnector($this->email, $this->password);
    }
}
interface SocialNetworkConnector
{
    public function logIn(): void;

    public function logOut(): void;

    public function createPost($content): void;
}
class FacebookConnector implements SocialNetworkConnector{
    private $login,$password;
    public function __construct(String $login,String $password){
        $this->login = $login;
        $this->password=$password;
    }
    public function logIn():void{
        echo "Send HTTP API request to log in user $this->login with " .
        "password $this->password\n";
    }
    public function logOut(): void
    {
        echo "Send HTTP API request to log out user $this->login\n";
    }

    public function createPost($content): void
    {
        echo "Send HTTP API requests to create a post in Facebook timeline.\n.$content";
    }
}
class LinkedInConnector implements SocialNetworkConnector
{
    private $email, $password;

    public function __construct(string $email, string $password)
    {
        $this->email = $email;
        $this->password = $password;
    }

    public function logIn(): void
    {
        echo "Send HTTP API request to log in user $this->email with " .
            "password $this->password\n";
    }

    public function logOut(): void
    {
        echo "Send HTTP API request to log out user $this->email\n";
    }

    public function createPost($content): void
    {
        echo "Send HTTP API requests to create a post in LinkedIn timeline.\n.$content";
    }
}
function clientCode(SocialNetworkPoster $creator)
{
    // ...
    $creator->post("Hello world!\n");
    $creator->post("I had a large hamburger this morning!\n");
    // ...
}
echo "Testing ConcreteCreator1:\n";
clientCode(new FacebookPoster("john_smith", "******"));
echo "\n\n";
echo "Testing ConcreteCreator2:\n";
clientCode(new LinkedInPoster("john_smith@example.com", "******"));


abstract class EventLoop {

   /**
     * ddddd
      */
    abstract function isFinish();

    /**
     * xxx
     */
    abstract function preProcess();

    abstract function process();

    abstract function postProcess();

    /**
     * dddd
     */
    function start() {
        $this->preProcess();

        while (!$this->isFinish()) {
            $this->process();
        }

        $this->postProcess();
    }
}

class FindWifeEventLoop extends EventLoop {

    private $_found = false;

    private $_numberOfTimes = 0;

    function isFinish() {
        return $this->_found === true;
    }

    function preProcess() {
        echo "Start finding a wife\n";
    }

    function process() {
        if ($this->_numberOfTimes < 5) {
            echo "Huhu\n";
            $this->_numberOfTimes++;
        } else {
            $this->_found = true;
            echo "Hehe\n";
        }
    }

    function postProcess() {
        echo "Done\n";
    }
}

$myClass = new FindWifeEventLoop();
$myClass->start();