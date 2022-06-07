<?php

namespace Model;

class Error
{
    const danger = "danger";
    const success = "success";
    const warning = "warning";

    public $type;
    public $content;
    public function __construct($error = null)
    {
        if ($error) {
            $this->type = $error["type"];
            $this->content = $error["content"];
        }
    }

    static  function set($error)
    {
        $_SESSION["Error"] = $error;
    }
    static function get()
    {
        $item = $_SESSION["Error"] ?? null;
        unset($_SESSION["Error"]);
        if ($item == null)
            return null;
        return new Error([
            "type" => $item["type"] ?? "",
            "content" => $item["content"] ?? ""
        ]);
    }
}
