<!DOCTYPE html>
<html>
    <head>
        <title>Hello</title>
        <meta charset="utf-8">
        <link rel="short cut" 
    </head>
    <body>
        <?php 
        $g=true;
            if(isset($_COOKIE["val"]) && isset($_POST["val"])){
                $res=(int)$_COOKIE["val"];
                if(!is_numeric($_POST["val"])){
                    echo '<p>Input must be an integer</p>';
                }
                else{
                    $cur=(int)$_POST["val"];
                if($res>$cur){
                    echo '<p>Greater</p>';
                }
                elseif($res==$cur){
                    echo '<p>Congrads<br/><a href="index.php">again</a></p>';
                    $g=false;
                }
                else{
                    echo '<p>Smaller</p>';
                }}
            }
            else
            {
                $val=rand(1,99);
                setcookie("val",$val);
                echo '<p>Try to guess the number</p>';
            }
            if($g)
            echo '
            <form method="POST">
            <input type="text" name="val">
            <input type="submit" value="send">
            </form>'; 
        ?>
    </body>
</html>