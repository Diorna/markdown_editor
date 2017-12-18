<!DOCTYPE HTML>
<html>
<head>
	<title>Test-markdown editor</title>
	<meta http-equiv="expires" content="0" />
	<meta http-equiv="pragma" content="no-cache" />
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <link href="css/main.css" type="text/css" media="screen" rel="stylesheet" />
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    
    <script language="javascript" type="text/javascript">
        $(document).ready(function(){
            $('#textarea').keyup(function(e) {
                var val = document.getElementById('textarea').value;
                $.ajax({
                    url: 'treatment.php',
                    type: 'POST',
                    data: "text=" + val,
                    success: function(data){
                        $('#result').html(data);
                    } 
                });
            });
        });        
     </script> 
</head>

<body>
     <div id="markdown">
       <div class="caption edit">
           Test Markdown Editor
           <div class="instr">
               # Заголовок - вся строка, которая начинается с #, а далее с этим текстом помещается в тег &lt;h1&gt;. При переходе на новую строку, тег &lt;h1&gt; закрывается.<br>
                **Жирный текст** - Текст помещенный между ** становится жирным.<br>
                *Кусив* - Текст помещенный между * становится как курсив, Перенос строки заменяется на &lt;br&gt;.
           </div>
       </div>
       <div id="text">
           <textarea id="textarea">
#Lorem ipsum
**Lorem ipsum** dolor sit amet, consectetur adipiscing elit. 
Aenean ultricies, *tellus eu hendrerit facilisis, enim mauris* porttitor orci, eu condimentum quam sapien sed purus. Suspendisse nec sodales lectus. Vivamus pulvinar gravida rutrum. 
Aliquam **hendrerit** faucibus malesuada. In ornare dolor et lacus *vehicula*, nec consequat tortor hendrerit. 
           </textarea>
        </div>    
    </div>
    <div id="preview">
        <div class="caption format">
            Formatted text
            <div class="instr">
               Место для отформатированного в html текста
           </div>
        </div>
        <div id="result"></div>
    </div>
    
</body>
</html>