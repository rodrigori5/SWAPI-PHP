<?php
require_once dirname(__DIR__, 1) . '/vendor/autoload.php';
require_once dirname(__DIR__, 1) . '/view/View.php';

use SWAPI\SWAPI;

class MainController
{
    public $dir;
    public $pageData;
    public $swapi;
    
    public function __construct(){
        $this->pageData["baseTitle"] = "Star Wars";
        $this->pageData["baseURL"] = "http://" .  $_SERVER['SERVER_NAME'] . "/SWAPI-PHP";
        $this->swapi = new SWAPI();

        if(!isset($_GET["page"])){
            $pageRequested = 'index';
        }else{
            $pageRequested = $_GET["page"];
        }

        $this->buildPage($pageRequested);
    }

    function buildPage($page){
        switch($page){
            case 'index':
                $this->buildIndex();
                break;
            case 'movie':
                $this->buildMoviePage();
                break;
            case 'planet':
                $this->buildPlanetPage();
                break;
            case 'character':
                $this->buildCharPage();
                break;
            case 'vehicle':
                $this->buildVehiclePage();
                break;
            case 'species':
                $this->buildSpeciesPage();
                break;
            case 'starship':
                $this->buildStarshipPage();
                break;
            default:
                $this->throw404();
                break;
        }
    }

    function buildIndex(){
        $data["films"] = $this->swapi->films()->index();

        foreach($data["films"] as $film){
            $film->id = $this->swapi->extractIdFromUrl($film->url);
        }
        $data["page"] = $this->pageData;
        $this->pageData["pageTitle"] = "Home";
        $this->swapi->films()->logRequest($_SERVER['REQUEST_METHOD'],$_SERVER['REQUEST_URI'] ); // Log the request


        $view = new View('inc/header', $this->pageData);
        $view = new View('IndexView', $data);
    }

    function buildMoviePage(){
        if(isset($_GET["film"])){
            $film_id = $_GET["film"];
        }else{
            $this->throw404();
            die();
        }

        try {
            $data["film"] = $this->swapi->films()->get($film_id);

            $data["film"]->id = $film_id;

            $this->gatherAllData($data["film"]->characters);
            $this->gatherAllData($data["film"]->species);
            $this->gatherAllData($data["film"]->starships);
            $this->gatherAllData($data["film"]->vehicles);
            $this->gatherAllData($data["film"]->planets);

            
            $data["page"] = $this->pageData;
            $this->pageData["pageTitle"] = "Film: " . $data["film"]->title;
            
            $header = new View('inc/header', $this->pageData);
            $view = new View('MovieView', $data);
            $this->swapi->films()->logRequest($_SERVER['REQUEST_METHOD'],$_SERVER['REQUEST_URI'] ); // Log the request
        } catch (GuzzleHttp\Exception\ClientException $exception) {
            $this->throw404();
        }
    }
    function buildPlanetPage(){
        if(isset($_GET["planet"])){
            $planet_id = $_GET["planet"];
        }else{
            $this->throw404();
            die();
        }
        try {
            $data["page"] = $this->pageData;

            $data["planet"] = $this->swapi->planets()->get($planet_id);
        
            $this->gatherAllData($data["planet"]->residents);
            $this->gatherAllData($data["planet"]->films);

            $header = new View('inc/contentHeader', $this->pageData);
            $view = new View('PlanetView', $data);
            $this->swapi->planets()->logRequest($_SERVER['REQUEST_METHOD'],$_SERVER['REQUEST_URI'] ); // Log the request
        } catch (GuzzleHttp\Exception\ClientException $exception) {
            $this->throw404();
        }
    }

    function buildCharPage(){
        if(isset($_GET["char"])){
            $char_id = $_GET["char"];
        }else{
            $this->throw404();
            die();
        }
        try {
            $data["page"] = $this->pageData;

            $data["character"] = $this->swapi->characters()->get($char_id);
            
            if(!is_null($data["character"]->homeworld)){
                $data["character"]->homeworld = $this->swapi->getFromUri($data["character"]->homeworld->url);
                $data["character"]->homeworld->id = $this->swapi->extractIdFromUrl($data["character"]->homeworld->url);
            }

            $this->gatherAllData($data["character"]->films);
            $this->gatherAllData($data["character"]->species);
            $this->gatherAllData($data["character"]->starships);
            $this->gatherAllData($data["character"]->vehicles);

            $header = new View('inc/contentHeader', $this->pageData);
            $view = new View('CharacterView', $data);
            $this->swapi->characters()->logRequest($_SERVER['REQUEST_METHOD'],$_SERVER['REQUEST_URI'] ); // Log the request
        } catch (GuzzleHttp\Exception\ClientException $exception) {
            $this->throw404();
        }
    }

    function buildVehiclePage(){
        if(isset($_GET["vehicle"])){
            $vehicle_id = $_GET["vehicle"];
        }else{
            $this->throw404();
            die();
        }
        try {
            $data["page"] = $this->pageData;
            $data["vehicle"] = $this->swapi->vehicles()->get($vehicle_id);
            
            $this->gatherAllData($data["vehicle"]->films);
            $this->gatherAllData($data["vehicle"]->pilots);

            $header = new View('inc/contentHeader', $this->pageData);
            $view = new View('VehicleView', $data);
            $this->swapi->vehicles()->logRequest($_SERVER['REQUEST_METHOD'],$_SERVER['REQUEST_URI'] ); // Log the request
        } catch (GuzzleHttp\Exception\ClientException $exception) {
            $this->throw404();
        }
    }

    function buildSpeciesPage(){
        if(isset($_GET["species"])){
            $species_id = $_GET["species"];
        }else{
            $this->throw404();
            die();
        }
        try {
            $data["page"] = $this->pageData;
            $data["species"] = $this->swapi->species()->get($species_id);
            
            if(!is_null($data["species"]->homeworld)){
                $data["species"]->homeworld = $this->swapi->getFromUri($data["species"]->homeworld->url);
                $data["species"]->homeworld->id = $this->swapi->extractIdFromUrl($data["species"]->homeworld->url);
            }

            $this->gatherAllData($data["species"]->films);
            $this->gatherAllData($data["species"]->people);

            $header = new View('inc/contentHeader', $this->pageData);
            $view = new View('SpeciesView', $data);
            $this->swapi->species()->logRequest($_SERVER['REQUEST_METHOD'],$_SERVER['REQUEST_URI'] ); // Log the request
        } catch (GuzzleHttp\Exception\ClientException $exception) {
            $this->throw404();
        }
    }

    function buildStarshipPage(){
        if(isset($_GET["starship"])){
            $starship_id = $_GET["starship"];
        }else{
            $this->throw404();
            die();
        }
        try {
            $data["page"] = $this->pageData;
            $data["starship"] = $this->swapi->starships()->get($starship_id);
        
            $this->gatherAllData($data["starship"]->films);
            $this->gatherAllData($data["starship"]->pilots);

            $header = new View('inc/contentHeader', $this->pageData);
            $view = new View('StarshipView', $data);
            $this->swapi->starships()->logRequest($_SERVER['REQUEST_METHOD'],$_SERVER['REQUEST_URI'] ); // Log the request
        } catch (GuzzleHttp\Exception\ClientException $exception) {
            $this->throw404();
        }
    }

    function throw404(){
        $view = new View('404', null);
    }

    function gatherAllData(&$objArray){
        if(count($objArray) > 0){
            $objType = gettype($objArray[0]);
            if($objType == 'object'){
                foreach($objArray as &$o){
                    $o = $this->swapi->getFromUri($o->url);
                    $o->id = $this->swapi->extractIdFromUrl($o->url);
                }
            }else if($objType == 'string'){
                foreach($objArray as &$o){
                    $o = $this->swapi->getFromUri($o);
                    $o->id = $this->swapi->extractIdFromUrl($o->url);
                }
            }else{
                throw new Exception("gatherAllData() Invalid object format received: $objType");
            }
        }
    }
}
?>