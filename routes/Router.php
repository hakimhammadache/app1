<?php


namespace Router;

use Router\Route;

use App\Exceptions\NotFoundException;


class Router  
{
    
    /**
     * [$url description]
     * @var [type]
     */
    public $url;


    /**
     * [$routes description]
     * @var array
     */
    public $routes = []; //lien avec la class Route
    

    /**
     * [__construct description]
     * @param [type] $url [description]
     */
    public function __construct($url)
    {
        $this->url = trim($url, '/'); 
    }
    

    /**
     * [get description]
     * @param  string $path   [description]
     * @param  string $action [description]
     * @return [type]         [description]
     */
    public function get(string $path, string $action)
    {
        $this->routes['GET'][] = new Route($path,$action); 
    }


    /**
     * [post description]
     * @param  string $path   [description]
     * @param  string $action [description]
     * @return [type]         [description]
     */
    public function post(string $path, string $action)
    {
        $T = $this->routes['POST'][] = new Route($path,$action);
        
        //var_dump($T);
        //die();
    }
    public function Affiche(string $lien)
    {
        
        require $lien;
    }

    /**
     * [run description]
     * @return [type] [description]
     */
    public function run()
    {
        // REQUEST_METHOD--> renvoyer GET ou POST automatiquement
        foreach ($this->routes[$_SERVER['REQUEST_METHOD']] as $route ) {
            if ($route->matches($this->url)) {
                return $route->execute(); //appler le bon controller avec la bonne fonction
            }
        }
        throw new NotFoundException("page introuvable");
        return header('HTTP/1.0 404 Not Found');
    }
}
