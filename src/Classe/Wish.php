<?php 

namespace App\Classe;

use Symfony\Component\HttpFoundation\Session\SessionInterface;

class Wish {
    private $session; 

    public function __construct(SessionInterface $session)
    {
        $this->session = $session;
    }

    public function add($id)
    {
        $wish = $this->session->get('wish', []);
        if (!empty($wish[$id])){
            $wish[$id]++;
        } else {
            $wish[$id] = 1;
        }
        

        $this->session->set('wish', $wish);
    }

    public function get() 
    {
        return $this->session->get('wish');
    }

    public function remove()
    {
        return $this->session->remove('wish');
    }
}