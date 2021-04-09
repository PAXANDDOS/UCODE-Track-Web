<?php 

class Router {
    public $params;
    public function print() {
        echo(json_encode($this->params));
    }
    function queryToArray($qry)
    {
        $result = array();
        if(strpos($qry,'='))
            if(strpos($qry,'?')!==false) {
                $q = parse_url($qry);
                $qry = $q['query'];
            }
        else
            return false;

        foreach (explode('&', $qry) as $couple) {
                list($key, $val) = explode('=', $couple);
                $result[$key] = $val;
        }
        $this->params = empty($result) ? false : $result;
    }
}

?>