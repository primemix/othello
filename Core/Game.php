<?php

class Game
{
    public function runGame()
    {
        /* app start */
        if(isset($_POST['run'])) {

                $board = new EntityGame\Board();
                $_SESSION = $board;
                $board->setSize(8);
                $size = $board->getSize();
                $array = $board->createBoard($size);
                $board->showBoard($array);

            
        }


        /* session destroy */
        if(isset($_POST['SD'])) {
            $_SESSION = session_destroy();
        }
    }

    /*
     *  return session info
     */
    public function info()
    {
        if(isset($_SESSION)) {
            echo '<pre>';
            print_r($_SESSION);
            echo '</pre>';
        }
    }
}