<?php

class Game
{
    public function initGame()
    {
        if (!empty($_POST['size']) AND !empty($_POST['player1'])
                                  AND !empty($_POST['player2'])) {
            $_SESSION['size'] = $_POST['size'];
            $_SESSION['player1'] = $_POST['player1'];
            $_SESSION['player2'] = $_POST['player2'];
                self::runGame();
            } else {
                self::formInit();
        }

        /* session destroy */
        if(isset($_POST['SD'])) {
            session_destroy();
//            unset ($_SESSION['size']);
//            unset ($_SESSION['player1']);
//            unset ($_SESSION['player2']);
//            unset ($_SESSION['board']);
            unset ($_COOKIE['PHPSESSID']);
            header('location:http://reversi.loc');
        }
    }

    public function runGame()
    {
        /* app start */
        $player1 = new EntityGame\Player();
        $_SESSION['p1'] = $player1;
        $player1->setName($_SESSION['player1']);
        $player1 = $player1->getName();

        $player2 = new EntityGame\Player();
        $_SESSION['p2'] = $player2;
        $player2->setName($_SESSION['player2']);
        $player2 = $player2->getName();

        $board = new EntityGame\Board();
        $_SESSION['board'] = $board;

        $board->setSize($_SESSION['size']);
        $size = $board->getSize();
        $array = $board->createBoard($size);
        $board->showBoard($array);

    }

    /*
     *  return session info
     */
    public function info()
    {
        if(isset($_SESSION)) {
            echo '<pre>';
            print_r($_SESSION['p1']);
            print_r($_SESSION['p2']);
            print_r($_SESSION['board']);
            echo '</pre>';
        }
    }

    /**
     * size Init form
     */
    public function formInit()
    {
        echo '
            <form method="post">
                <input type="number" placeholder="enter size" name="size">
                <input type="text" placeholder="Player 1" name="player1">
                <input type="text" placeholder="Player 2" name="player2">
                <input type="submit" class="waves-effect waves-light btn indigo 
                darken-1" value="Go">
            </form>';
    }
}