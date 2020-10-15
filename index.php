<?php
$posted=false;
if($_POST){
    $posted=true;
    $sender=$_POST['name'];
    $to=$_POST['to'];
    $from=$_POST['from'];
    $subject=$_POST['subject'];
    $message=$_POST['message'];
    
    $headers=array();
    $headers[]="MIME-VERSION: 1.0";
    $headers[]="Content-type: text/plain; charset=iso-8859-1";
    $headers[]="From: {$sender} <".$from.">";
    $headers[] = "Subject: {$subject}";
    $headers[] = "X-Mailer: PHP/".phpversion();
    if(mail($to, $subject, $message, implode("\r\n", $headers))){
		$result="Email sent successfully";
	}
	else{
		$result="Failure sending email";
	}


}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Creepster&family=Griffy&display=swap" rel="stylesheet">
    <title>FAKE MAILING TOOL</title>
</head>
<style>
    *{
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: 'Creepster', cursive;
    }
    ::-webkit-scrollbar-thumb{
        background: #fff;
        border-radius: 10px;
        
    }
    ::-webkit-scrollbar{
        background: none;
        width: 10px;
    }
    body{
        min-height: 100vh;
        width: 100%;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        background: #000;
        padding: 1rem 3rem;
    }
    .warning{
        display: flex;
        align-items: center;
    }
    .warning img{
        filter: invert();
        padding: 1rem;
    }
    .warning span{   
        color: #fff;
        font-size: 2em;
    }
    .container{
        display: flex;
        flex-direction: column;
        align-items: center;
    }
    form{
        position: relative;
        display: flex;
        flex-direction: column;
        align-items: center;
        padding: 1rem;
        width: 60vw;
        height: fit-content;
        max-width: 75vw;
    }
    h1{
        display: block;
        margin: 0 auto;
        color: #fff;
        font-size: 6em;
        font-family: 'Griffy', cursive;
        font-weight: 900;
    }
    hr{
        width: 100%;
        margin: 1rem;
        background: #fff;
        height: 1vh;
    }
    .status{
        color: #000;
        background: #fff;
        width: 70%;
        height: 5vh;
        border-radius: 10px;
        margin: 1rem;
        display: flex;
        padding-left: 10px;
        align-items: center;
        
    }
    .status span{
        border: 2px solid #000;
        border-radius: 10px ;
        padding: .45rem;
        margin-left: auto;
    }
    form input,
    form textarea{
        width: 80%;
        margin: 1rem;
        padding: .5rem;
        outline: none;
        border-top-left-radius: 10px;
 
    }
    form textarea{
        height: 25vh;
        resize: none;
    }
    button{
        font-size: 1.3rem;
        outline: none;
        padding: 1.25rem 2rem;
        border-top-left-radius: 10px;
        transition: 0.5s;
    }
    button:hover{
        font-size: 1.5rem;
        transition: 0.5s;
    }
    @media only screen and (max-width:768px){
        html{
            font-size: .8rem;
        }
    }
    @media only screen and (max-width:550px){
        html{
            font-size: .5rem;
        }
    }
    @media only screen and (min-width:2000px){
        html{
            font-size: 2rem;
        }
    }
</style>
<body>
    <div class="warning">
        <img src="bg1.png">
        <span> WARNING! USE IT IN YOUR OWN RISK</span>
    </div>
    <hr>
    <div class="container">
        <?php
            if($posted){
                if($result)
                    echo "<div class='status' id='status' style='display:flex'>";
                    echo "<div>$result</div>";
                    echo "<span id='close'>x</span>";
                    echo "</div>";
            }
        ?>
        <h1>SEND EMAIL</h1>
        <form method="post" id="mailerDevil">
            <input type="email" name="to" placeholder="RECIEVER EMAIL">
            <input type="email" name="from" placeholder="SENDER EMAIL">
            <input type="text" name="name" placeholder="SENDER NAME">
            <input type="text" name="subject" placeholder="SUBJECT">
            <textarea type="text" name="message" placeholder="MESSAGE"></textarea>
            
        </form>
        <button type="submit" form="mailerDevil" value="Submit">Send</button>
    </div>
    <hr>
    <footer>
            copyright &copy; mailtool333 || All rights reserved
    </footer>
<script>
    document.getElementById('close').addEventListener('click',()=>{
        document.getElementById('status').style.display='none'
    })
    if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }

</script>
</body>
</html>