<?php

class BaseController
{
    private $defaultPanigationSize = 3;
    private $currentUser = null;
    private $viewExtension = 'php';
    private $defaultLayoutName = 'layout';
    public function __construct()
    {
        session_start();
        $this->currentUser = !empty($_SESSION['user']) ? $_SESSION['user'] : null;
    }

    protected function getPagination()
    {
        $pagination = [
            'start' => 0,
            'size' => $this->defaultPanigationSize
        ];
        $parts = [];
        parse_str($_SERVER['QUERY_STRING'], $parts);
        if (isset($parts['start'])) {
            $pagination['start'] = $parts['start'];
        }

        if (isset($parts['size'])) {
            $pagination['size'] = $parts['size'];
        }
        return $pagination;
    }

    protected function getPathVariable()
    {
        $parsedUrl = parse_url($_SERVER['REQUEST_URI']);
        $path = isset($parsedUrl['path']) ? $parsedUrl['path'] : '';
        $parts = explode('/', $path);
        $length = count($parts);
        if ($length === 0) {
            return null;
        }
        return filter_var($parts[$length - 1], FILTER_SANITIZE_STRING);;
    }

    protected function isAuthenticated()
    {
        return $this->currentUser != null ? true : false;
    }

    protected function setCurrentUser($user)
    {
        $_SESSION['user'] = $user;
    }

    protected function getVariables()
    {
        $postedVariables = $_POST;
        $result = new stdClass();
        foreach ($postedVariables as $key => $value) {
            $result->$key = filter_var($value, FILTER_SANITIZE_STRING);
        }
        return $result;
    }

    protected function isPost()
    {
        return $_SERVER['REQUEST_METHOD'] === 'POST';
    }

    protected function loadContentOfFileByPath($path)
    {
        return file_get_contents($path);
    }

    function redirect($url, $statusCode = 303)
    {
        header('Location: ' . $url, true, $statusCode);
        exit();
    }

    protected function view($templateName, $tempalteVariables, $layoutName = null)
    {

        $parent = dirname(__DIR__, 1);
        $separator = DIRECTORY_SEPARATOR;
        $layout = $layoutName != null ? $layoutName : $this->defaultLayoutName;

        //load target view        
        $templatePath = "{$parent}{$separator}view{$separator}{$templateName}.{$this->viewExtension}";
        $templateContent = $this->loadContentOfFileByPath($templatePath);

        //prepare layout
        $layoutPath = "{$parent}{$separator}view{$separator}{$layout}.{$this->viewExtension}";
        $layoutContent = $this->loadContentOfFileByPath($layoutPath);

        $pattern = '/{{ body }}/i';
        $layoutContent = preg_replace($pattern, $templateContent, $layoutContent);

        $m = new Mustache_Engine([
            'entity_flags' => ENT_QUOTES
        ]);
        $renderedDocument = $m->render(
            $layoutContent,
            array_merge($tempalteVariables, [
                'user' => $this->currentUser
            ])
        );

        echo $renderedDocument;
        exit();
    }
}
