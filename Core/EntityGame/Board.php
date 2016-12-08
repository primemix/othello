<?php

namespace EntityGame;

class Board
{
    protected $size;
    protected $matrix = array();

    /**
     * @param $size integer
     * @return mixed
     */
    public function setSize($size)
    {
        $this->size = $size;
    }

    /**
     * @return mixed
     */
    public function getSize()
    {
        return $this->size;
    }
    
    /**
     * @param $size integer
     * @return mixed
     */
    public function createBoard($size)
    {
        for($x = 1; $x <= $size; $x++) {
            for($y = 1; $y <= $size; $y++) {
                $this->matrix[$x][$y] = 0;
            }
        }
        $this->startPosition();
        return $this->matrix;
    }

    /**
     * setup players start position
     * @return array
     */
    private function startPosition()
    {
        $area = $this->size / 2;
        if (is_int($area)) {
            $this->matrix[$area][$area] = 4;
            $this->matrix[$area + 1][$area + 1] = 4;
            $this->matrix[$area][$area +1] = 3;
            $this->matrix[$area +1][$area] = 3;
//            $this->matrix[4][6] = 1;
//            $this->matrix[3][5] = 1;
//            $this->matrix[6][4] = 1;
//            $this->matrix[5][3] = 1;
        } else {
            echo 'error, the size can\'t be: ' . $this->size . '';
        }
    }

    /**
     * @param $array
     */
    public function showBoard($array)
    {
        echo '<table class="card-panel lighten-5 z-depth-1">';
        foreach ($array as $x => $value) {
            echo '<tr>';
            foreach ($value as $y => $item) {
                echo '<th class="smalt">';
                if($item > 2) {
                    $item = (($item == 3) ? 'red-my' : 'blue-my');
echo '<div class="btn-floating '.$item.'"></div>';
                } elseif($item == 1) {
                        echo '<a href="#"><div class="btn-floating grey-true"></div></a>';
                } else {
                    echo '<div class="grey"></div>';
                }

                    
                    echo '</th>';
            }
            echo '</tr>';
        }
        echo '</table>';
    }
}