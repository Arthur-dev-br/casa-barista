<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    // Tabela utilizada para autenticação
    protected $table = 'tbl_usuarios';

    // Chave primária
    protected $primaryKey = 'id_usuario';

    // Datas personalizadas da tabela
    const CREATED_AT = 'data_criacao_usuario';
    const UPDATED_AT = 'data_atualizacao_usuario';

    // Campos permitidos
    protected $fillable = [
        'nome_usuario',
        'email_usuario',
        'senha_usuario',
        'foto_usuario',
        'nivel_usuario',
        'status_usuario',
    ];

    // Campos ocultos
    protected $hidden = [
        'senha_usuario',
    ];

    /**
     * Conversões automáticas
     */
    protected function casts(): array
    {
        return [
            'senha_usuario' => 'hashed',
        ];
    }

    /**
     * Campo utilizado pelo Laravel como senha.
     */
    public function getAuthPasswordName(): string
    {
        return 'senha_usuario';
    }

    /**
     * Retorna a senha criptografada.
     */
    public function getAuthPassword(): string
    {
        return $this->senha_usuario;
    }
}