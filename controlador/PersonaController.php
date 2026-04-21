<?php

class PersonaController{
    // metodos o funciones

    //crud de registro
    public function store($_POST){
        //  if(!is_numeric( $_POST['edad'])){
        //     return[
        //         'success' => false,
        //         'message' => 'el valor de edad tiene que ser numerico'
        //     ]
        //  }
        $data = [];
        $data['edad'] = $_POST['edad'];
        $data['nombre'] = $_POST['nombre']; 
        $this->registrarPersona($data);
    }


    //crud update
    public function update($_POST){
       
    }
}