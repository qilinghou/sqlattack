<?php
/**
     * 过滤参数
     * @param string $str 接受的参数
     * @return string
     */
    static public function filterWords($str)
    {
        $farr = array(
                "/<(\\/?)(script|i?frame|style|html|body|title|link|meta|object|\\?|\\%)([^>]*?)>/isU",
                "/(<[^>]*)on[a-zA-Z]+\s*=([^>]*>)/isU",
                "/select|insert|update|delete|\'|\/\*|\*|\.\.\/|\.\/|union|into|load_file|outfile|dump/is"
        );
        $str = preg_replace($farr,'',$str);
        return $str;
    }
     
    /**
     * 过滤接受的参数或者数组,如$_GET,$_POST
     * @param array|string $arr 接受的参数或者数组
     * @return array|string
     */
    static public function filterArr($arr)
    {
        if(is_array($arr)){
            foreach($arr as $k => $v){
                $arr[$k] = self::filterWords($v);
            }
        }else{
            $arr = self::filterWords($v);
        }
        return $arr;
    }