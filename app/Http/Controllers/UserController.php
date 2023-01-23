<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Exception;
use Symfony\Component\HttpFoundation\Response;
use Termwind\Components\Dd;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            // check if any user exist
            $userExist = User::exists();
            if (!$userExist) {
                return $this->apiResponse(false, "No user exist on the user table, Add user to view",  Response::HTTP_NOT_FOUND);
            };

            // return list of all added users
            $user = User::all();
            return $this->apiResponse(false, "Get all user fetched successfully",  Response::HTTP_OK, $user);
        } catch (Exception $e) {
            return $this->apiResponse(true, $e->getMessage(), Response::HTTP_BAD_REQUEST);
        }
    }

     /**
     * Show a single user by User ID.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try {
            // check if user with ID exist
            $userExist = User::where('id', $id)->exists();
            if (!$userExist) {
                return $this->apiResponse(false, "No user with this ID exist on the user table",  Response::HTTP_NOT_FOUND);
            };

            // insert user data into database
            $user = User::where('id', $id)->first();

            return $this->apiResponse(false, "User details retrived successfully",  Response::HTTP_OK, $user);
        } catch (Exception $e) {
            return $this->apiResponse(true, $e->getMessage(), Response::HTTP_BAD_REQUEST);
        }
    }

    /**
     * Store a newly created User in storage.
     *
     * @param  \App\Http\Requests\UserRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        try {
            $data = $request->all();

            // insert user data into database
            $addUser = User::create($data);

            return $this->apiResponse(false, "New User added successfully",  Response::HTTP_OK, $addUser);
        } catch (Exception $e) {
            return $this->apiResponse(true, $e->getMessage(), Response::HTTP_BAD_REQUEST);
        }
    }


    /**
     * Update the specified User in storage.
     *
     * @param  \App\Http\Requests\UserUpdateRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserUpdateRequest $request, $id)
    {
        try {
            // check if user with ID exist
            $userExist = User::where('id', $id)->exists();
            if (!$userExist) {
                return $this->apiResponse(false, "No user with this ID exist on the user table",  Response::HTTP_NOT_FOUND);
            };

            $data = $request->all();

            // find user by id
            $user = User::find($id);

            // update specific user
            $userUpdate = $user->update($data);

            return $this->apiResponse(false, "User data updated successfully",  Response::HTTP_OK, $user);
        } catch (Exception $e) {
            return $this->apiResponse(true, $e->getMessage(), Response::HTTP_BAD_REQUEST);
        }
    }

    /**
     * Remove the specified User from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            // check if user with ID exist
            $userExist = User::where('id', $id)->exists();
            if (!$userExist) {
                return $this->apiResponse(false, "No user with this ID exist on the user table",  Response::HTTP_NOT_FOUND);
            };

            // find user by id
            $user = User::find($id);

            // delete specific user
            $user->delete();
            return $this->apiResponse(false, "User data deleted successfully",  Response::HTTP_OK, $user);
        } catch (Exception $e) {
            return $this->apiResponse(true, $e->getMessage(), Response::HTTP_BAD_REQUEST);
        }
    }
}
