<?php
    //Разбиваем массив на строки
    $line = explode("\n", $_POST['text']);
    
    foreach ($line as $li){ //перебираем в цикле каждую строку
        $str = "";                      
        $regexp = "/\*\*(.*?)\*\*/";    //Регулярное выражение для жирного шрифта
        $regexp_i = "/\*(.*?)\*/";      //Регулярное выражение для курсива
        
        if(preg_match("/^#/", $li)){  // если строка начинается с #,
            $li = substr($li, 1);     // правим формат заголовка
            $li ="<h1>".$li."</h1>"; 
            echo str_replace(array("\r\n", "\r", "\n"), '<br>', $li);
        }else{
            $str= $str.$li."<br>";         
            if(preg_match($regexp, $li)){                   //Если в строке есть соответствие регулярному выражению для жирного шрифта,
                $str = preg_replace_callback($regexp,       //участок строки форматируется
                             function ($matches){
                                 $matches[0] = substr($matches[0], 2);
                                 $matches[0] = substr($matches[0],0, -2);
                                 $matches[0] = "<b>".$matches[0]."</b>";
                                 return $matches[0];
                             }, $str);
            };
            if(preg_match($regexp_i, $li)){                 //Если в строке есть соответствие регулярному выражению для курсива,
                $str = preg_replace_callback($regexp_i,     //участок строки форматируется
                             function ($matches){
                                 $matches[0] = substr($matches[0], 1);
                                 $matches[0] = substr($matches[0],0, -1);
                                 $matches[0] = "<i>".$matches[0]."</i>";
                                 return $matches[0];
                             }, $str);
            };
            //переносы строки замещаются тэгом <br>
            echo str_replace(array("\r\n", "\r", "\n"), '<br>', $str);
        };
     };    
  
?>




