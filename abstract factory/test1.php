<?php

namespace RefactoringGuru\Singleton\Conceptual;


interface SoccerFactory{
    
    function mensoccertournament():MenSoccer;
    function Youngsoccertournament():YoungSoccer;
    function Womensoccertournament():WomenSoccer;
}

class EnglandSoccerFactory implements SoccerFactory{
    public function mensoccertournament():MenSoccer{
        return new EnglandMenSoccer();
    }
    public function Youngsoccertournament():YoungSoccer{
        return new EnglandYoungSoccer();
    }
    public function Womensoccertournament():WomenSoccer{
        return new EnglandWomenSoccer();
    }
}

class GermanySoccerFactory implements SoccerFactory{
    public function mensoccertournament():MenSoccer{
        return new GermanyMenSoccer();
    }
    public function Youngsoccertournament():YoungSoccer{
        return new GermanyYoungSoccer();
    }
    public function Womensoccertournament():WomenSoccer{
        return new GermanyWomenSoccer();

    }
}
class ItaliaSoccerFactory implements SoccerFactory{
    public function mensoccertournament():MenSoccer{
        return new ItaliaMenSoccer();
    }
    public function Youngsoccertournament():YoungSoccer{
        return new ItaliaYoungSoccer();
    }
    public function Womensoccertournament():WomenSoccer{
        return new ItaliaWomenSoccer();

    }
}
interface MenSoccer{
    function footballFieldSurface();
    function CompetitionRules();
}
Class EnglandMenSoccer implements MenSoccer{
    public function footballFieldSurface(){
        echo"footballFieldSurface England Men"."\n";
    }
    public function CompetitionRules(){
        echo"CompetitionRules England Men"."\n";
    }
}
Class GermanyMenSoccer implements MenSoccer{
    public function footballFieldSurface(){
        echo"footballFieldSurface Germany Men"."\n";
    }
    public function CompetitionRules(){
        echo"CompetitionRules Germany Men"."\n";
    }
}
Class ItaliaMenSoccer implements MenSoccer{
    public function footballFieldSurface(){
        echo"footballFieldSurface Germany Men"."\n";
    }
    public function CompetitionRules(){
        echo"CompetitionRules Germany Men"."\n";
    }
}
interface YoungSoccer{
    function footballFieldSurface();
    function CompetitionRules();
}
Class EnglandYoungSoccer implements YoungSoccer{
    public function footballFieldSurface(){
        echo"footballFieldSurface England Young"."\n";
    }
    public function CompetitionRules(){
        echo"CompetitionRules England Young"."\n";
    }
}
Class GermanyYoungSoccer implements YoungSoccer{
    public function footballFieldSurface(){
        echo"footballFieldSurface Germany Young"."\n";
    }
    public function CompetitionRules(){
        echo"CompetitionRules Germany Young"."\n";
    }
}
Class ItaliaYoungSoccer implements YoungSoccer{
    public function footballFieldSurface(){
        echo"footballFieldSurface Italia Young"."\n";
    }
    public function CompetitionRules(){
        echo"CompetitionRules Italia Young"."\n";
    }
}
interface WomenSoccer{
    function footballFieldSurface();
    function CompetitionRules();
}
Class EnglandWomenSoccer implements WomenSoccer{
    public function footballFieldSurface(){
        echo"footballFieldSurface England Women"."\n";
    }
    public function CompetitionRules(){
        echo"CompetitionRules England Women"."\n";
    }
}
Class GermanyWomenSoccer implements WomenSoccer{
    public function footballFieldSurface(){
        echo"footballFieldSurface Germany Women"."\n";
    }
    public function CompetitionRules(){
        echo"CompetitionRules Germany Women"."\n";
    }
}
Class ItaliaWomenSoccer implements WomenSoccer{
    public function footballFieldSurface(){
        echo"footballFieldSurface Italia Women"."\n";
    }
    public function CompetitionRules(){
        echo"CompetitionRules Italia Women"."\n";
    }
}
function ClientCode(SoccerFactory $factory){
    $_mensoccer= $factory->mensoccertournament();
    $_womensoccer= $factory->womensoccertournament();
    $_youngsoccer= $factory->youngsoccertournament();
    $_mensoccer->footballFieldSurface();
    $_womensoccer->footballFieldSurface();
    $_womensoccer->footballFieldSurface();
}
echo "Client: Testing client code with the England soccer factory type:\n";
ClientCode(new EnglandSoccerFactory());

echo "\n";

echo "Client: Testing the same client code with the  Germany factory type:\n";
ClientCode(new GermanySoccerFactory());
echo "Client: Testing the same client code with the Italia factory type:\n";
ClientCode(new ItaliaSoccerFactory());