<?php

class App
{
    /**
     * Stores the controller from the split URL
     *
     * @var string
     */
    protected $controller = 'home';

    /**
     * Stores the method from the split URL
     * @var string
     */
    protected $method = 'index';

    /**
     * Stores the parameters from the split URL
     * @var array
     */
    protected $params = [];

    public function __construct()
    {
        $url = $this->parseUrl();

        if(array_key_exists(1, $url)) {
            if (file_exists('../app/controllers/' . ucfirst($url[1]) . '.php')) {
                $this->controller = $url[1];
                unset($url[0]);
            }

        }

        require_once '../app/controllers/' . ucfirst($this->controller) . '.php';

        $this->controller = new $this->controller();

        if(array_key_exists(2, $url)) {
            if (isset($url[2])) {
                if (method_exists($this->controller, $url[2])) {
                    $this->method = $url[2];

                    unset($url[2]);
                }
            }
        }


//        $this->params = $url ? array_values($url) : [];

        call_user_func_array([$this->controller, $this->method], $this->params);
    }

    /**
     * Parse the URL for the current request. Effectivly splits it, stores the controller
     * and the method for that controller.
     * @return array
     */
    public function parseUrl()
    {
        // Explode a trimmed and sanitized URL by /
        return $url = explode('/', filter_var(rtrim($_SERVER['REQUEST_URI'], '/'), FILTER_SANITIZE_URL));
    }
}
