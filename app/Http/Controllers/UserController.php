<?php

namespace App\Http\Controllers;

use App\User;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a message welcome.
     *
     * @return \Illuminate\Http\Response
     */
    public function initial()
    {
        return 'Desafio REST Trade Up is Running';
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $users = User::all();

            if ($users->isEmpty()) {
                return response()->json([
                    'message' => __("Base de dados sem usuários cadastrados"),
                    'type'    => 'success'
                ], 404);
            }

            return $users;

        } catch (Exception $e) {
            return new JsonResponse([
                'code'    => 500,
                'message' => 'Erro ao carregar lista de usuários',
            ], 500);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try {
            $user = User::find($id);

            if (empty($user)) {
                return response()->json([
                    'message' => __("Usuário não encontrado"),
                    'type'    => 'success'
                ], 404);
            }

            return $user;

        } catch (Exception $e) {
            return new JsonResponse([
                'code'    => 500,
                'message' => 'Erro ao carregar usuário',
            ], 500);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validated = $this->validateUserRequest($request);

        try {
            $user = User::find($id);

            if (empty($user)) {
                return response()->json([
                    'message' => __("Usuário não encontrado"),
                    'type'    => 'success'
                ], 404);
            }

            $user->update($validated);
            return $user;

        } catch (Exception $e) {
            return new JsonResponse([
                'code'    => 500,
                'message' => 'Erro ao atualizar usuário',
            ], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $user = User::find($id);

            if (empty($user)) {
                return response()->json([
                    'message' => __("Usuário não encontrado"),
                    'type'    => 'success'
                ], 404);
            }

            return $user->delete();

        } catch (Exception $e) {
            return new JsonResponse([
                'code'    => 500,
                'message' => 'Erro ao remover usuário',
            ], 500);
        }
    }

    /**
     * Validate fields of request.
     *
     * @param  Request $request
     * @return array
     */
    private function validateUserRequest(Request $request) {
        return $request->validate([
            "gender"                         => "string",
            "email"                          => "string",
            "phone"                          => "string",
            "cell"                           => "string",
            "nat"                            => "string",
            "status"                         => "required",
            "name.title"                     => "string",
            "name.first"                     => "string",
            "name.last"                      => "string",
            "location.street.number"         => "integer",
            "location.street.name"           => "string",
            "location.city"                  => "string",
            "location.state"                 => "string",
            "location.country"               => "string",
            "location.postcode"              => "string",
            "location.coordinates.latitude"  => "string",
            "location.coordinates.longitude" => "string",
            "location.timezone.offset"       => "string",
            "location.timezone.description"  => "string",
            "login.uuid"                     => "string",
            "login.username"                 => "string",
            "login.password"                 => "string",
            "login.salt"                     => "string",
            "login.md5"                      => "string",
            "login.sha1"                     => "string",
            "login.sha256"                   => "string",
            "dob.date"                       => "string",
            "dob.age"                        => "integer",
            "registered.date"                => "string",
            "registered.age"                 => "integer",
            "phone"                          => "string",
            "cell"                           => "string",
            "id_user.name"                   => "string",
            "id_user.value"                  => "string",
            "picture.large"                  => "string",
            "picture.medium"                 => "string",
            "picture.thumbnail"              => "string",
        ]);
    }
}
