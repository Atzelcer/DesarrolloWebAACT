<?php class Operations {
    private $a;

    private $b;

    private $c;

    public function __construct($a, $b, $c) {
        $this->a = $a;
        $this->b = $b;
        $this->c = $c;
    }   

    public function Sumar(): mixed{
        return $this->a + $this->b + $this->c;
    }

    public function Restar(): mixed{
        return $this->a - $this->b - $this->c;
    }   

    public function Multiplicar(): mixed{
        return $this->a * $this->b * $this->c;
    }   

    public function Dividir(): mixed{
        return $this->a / $this->b / $this->c;
    }
}

