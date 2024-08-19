<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;
use Illuminate\Testing\Fluent\Concerns\Has;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Jetstream\HasTeams;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Models\Role;
//spatie
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use HasTeams;
    use Notifiable;
    use TwoFactorAuthenticatable;
    use HasRoles;


    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array<int, string>
     */
    protected $appends = [
        'profile_photo_url',
    ];

    public function adminlte_image(){
        return 'https://picsum.photos/300/300';
    }

    public function adminlte_desc(){
        // Obtener el ID del usuario actual
        $userId = $this->id;
        // Obtener el usuario por su ID
        $user = User::find($userId);
        //$rol = $user->role->name;
        //return $rol;
        // Verificar si el usuario existe
        if ($user) {
            // Obtener el primer rol asignado al usuario
            $rol = $user->getRoleNames()->first();

            // Verificar si el usuario tiene algún rol asignado
            if ($rol) {
                return $rol;
            } else {
                return 'Rol no asignado';
            }
        } else {
            return 'Usuario no encontrado';
        }
    }

    public function adminlte_profile_url()
    {
        $identificador = $this->id;
        return 'usuarios/'.$identificador.'/edit';
    }
}
