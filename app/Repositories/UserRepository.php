<?php

namespace App\Repositories;

use App\Models\User;

class UserRepository
{
    /**
     * Try to find a user
     *
     * @param array $opts Options array
     * @param bool  $one  Return the first record or all records
     *
     * @return User
     */
    public function find($opts = [], $one = false)
    {
        $users = new User();

        foreach ($opts as $field => $value) {
            $users = $users->where([$field => $value]);
        }

        return $one ? $users->first() : $users;
    }

    /**
     * Create a new User
     *
     * @param array $opts           Option sarray
     * @param bool  $checkExistence Check if the user already exists
     *
     * @return bool
     */
    public function create($opts = [], $checkExistence = false)
    {
        if ($checkExistence) {
            if ($this->find($opts, true)) {
                return false;
            }
        }

        return User::create($opts);
    }
}