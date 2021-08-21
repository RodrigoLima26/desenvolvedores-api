<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Developer extends Model {

    use HasFactory;

    /**
     * @param $data
     */
    public function store($data) {

        $this->name = $data['nome'];
        $this->gender = $data['sexo'];
        $this->age = $data['idade'];
        $this->hobby = $data['hobby'];
        $this->birthdate = $data['datanascimento'];

        $this->save();

    }
}
