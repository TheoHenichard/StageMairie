<?php

namespace core;
/** Ce routeur gère les URLs sous la forme : http://localhost/nomController/nomFonction
 * Dans le controller nomController, il doit exister une fonction nomFonction
 * Par défaut, le controller est ActeController
 * return json
 */
class Router
{
    public static function route()
    {
        $url = isset($_GET['url']) ? explode('/', filter_var(rtrim($_GET['url'], '/'), FILTER_SANITIZE_URL)) : [];
         //Pour mise en prod, quand DocumentRoot de Apache pointera sur le bon dossier il faudra décommenter cette ligne et commenter la suivante (s'il reste des erreurs, vérifier le .htaccess)
        //$depart=0;

        $depart = 0;
        $controllerName = !empty($url[$depart]) ? ucfirst($url[$depart]) . "Controller" : "Controller";

        $action = $url[($depart + 1)] ?? "index";

        $controllerFile = __DIR__ . "/../controller/$controllerName.php";
        if (file_exists($controllerFile)) {
            require_once $controllerFile;
            $controller = new $controllerName();

            if (method_exists($controller, $action)) {
                $controller->$action();
            } else {
                http_response_code(404);
                echo json_encode(["error" => "Method not found"]);
            }
        } else {
            http_response_code(404);
            echo json_encode(["error" => "Controller not found"]);
        }
    }
}

?>