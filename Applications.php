<?php
class Appliction
{
    public static $ControllerName;
    public static $ActionName;
    public static $Params;
    public function setParams($uriArray)
    {
        self::$Params = [];
        if (isset($uriArray[3])) {
            array_shift($uriArray);
            array_shift($uriArray);
            array_shift($uriArray);
        }
        self::$Params = $uriArray;
    }

    public function getParams($index = null)
    {
        if ($index != null) {
            if (isset(self::$Params[$index])) {
                return self::$Params[$index];
            }
        }
        return self::$Params;
    }
    public function setControllerName($trlName)
    {
        self::$ControllerName = $trlName;
    }
    public function setActionName($trlName)
    {
        self::$ActionName = $trlName;
    }
}
