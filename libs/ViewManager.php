<?php
class ViewManager {
    private $variables = [];
    private $errors = [];

    public function render($view): void {
        $viewsDirectory = __DIR__ . DIRECTORY_SEPARATOR . ".." . DIRECTORY_SEPARATOR . "views" .  DIRECTORY_SEPARATOR;

        $viewManager = $this;
        require_once $viewsDirectory . $view . '.php'; 
    }

    public function set(string $property, $value): void {
        $this->variables[$property] = $value;
    }

    public function get(string $property) {
        if (isset($this->variables[$property])) {
            return $this->variables[$property];
        }
        return null;
    }

    public function setError(string $errorMessage): void {
        $this->errors[] = $errorMessage;
    }

    public function getErrors(): array {
        return $this->errors;
    }

    public function safeGetRequest(string $key) {
        if (isset($_REQUEST[$key])) {
            return $_REQUEST[$key];
        }
        return '';
    }
}