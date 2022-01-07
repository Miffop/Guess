<!DOCTYPE html>
<html>
    <head>
        <title>Hello</title>
        <link rel="stylesheet" href="Top.css"/>
        <link rel="stylesheet" href="Main.css"/>
    </head>
    <body>
        <div id="Top">
            <?php include "hat.php";?>
        </div>
        <div id="Main">
            <form method="POST">
                <?php
                function Begin()
                {
                    echo '<p>Сложность:</p>
                    <select multiple name="start">
                    <option value="20">Простая</option>
                    <option value="10" selected>Нормальная</option>
                    <option value="5">Сложная</option>
                    <option value="2">Невероятная</option>
                    </select><br/>
                    <input type="submit" value="Начать"/>';
                }
                function Input($atp)
                {
                    echo 
                    '<p>Попыток осталось: '.$atp.'</p>
                    <input type="text" name="try"/>
                    <input type="submit" name="tryb" value="Ввести"/>';
                }
                function EndGame($title)
                {
                    echo '<p class="ans">You '.$title.'</p>
                    <p><a href="Game.php">Again</a></p>';
                }

                if(isset($_POST["start"]))
                {
                    setcookie("val",rand(1,99));
                    setcookie("atp",$_POST["start"]-1);
                    echo '<p class="ans">Теперь, угадывай!</p>';
                    input($_POST["start"]);
                }
                elseif(isset($_POST["try"]))
                {
                    if($_COOKIE["atp"]==0)
                    {
                        EndGame("Lose");
                    }
                    else
                    {
                        $err=false;
                        $val=(int)$_COOKIE["val"];
                        if(!is_numeric($_POST["try"]))
                        {
                            echo '<p class="err">Wrong Input. Try Again.</p>';
                        }
                        else
                        {
                            $cur=$_POST["try"];
                            if($val>$cur)
                            {
                                echo '<p class="ans">Greater</p>';
                                setcookie("atp",$_COOKIE["atp"]-1);
                            }
                            elseif($val==$cur)
                            {
                                EndGame("Win");
                                $err=true;
                            }
                            else
                            {
                                echo '<p class="ans">Lower</p>';
                                setcookie("atp",$_COOKIE["atp"]-1);
                            }
                        }
                        if(!$err)
                        {
                            Input($_COOKIE["atp"]);
                        }
                    }
                }
                else
                {
                    Begin();
                }

                ?>
            </form>
            
        </div>
    </body>
</html>