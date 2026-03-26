<?php
namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use Firebase\JWT\JWT;
use Config\JWT as JWTConfig;
use App\Models\UserModel;
use App\Models\TeacherModel;

class Api extends ResourceController
{
    protected $format = 'json';

    // POST /api/register  (inserts into BOTH tables)
    public function register()
    {
        $rules = [
            'email'           => 'required|valid_email|is_unique[auth_user.email]',
            'first_name'      => 'required|min_length[2]',
            'last_name'       => 'required|min_length[2]',
            'password'        => 'required|min_length[6]',
            'university_name' => 'required',
            'gender'          => 'required|in_list[Male,Female,Other]',
            'year_joined'     => 'required|valid_date[Y]'
        ];

        if (!$this->validate($rules)) {
            return $this->failValidationErrors($this->validator->getErrors());
        }

        $data = $this->request->getJSON(true);

        $userModel = new UserModel();
        $teacherModel = new TeacherModel();

        // Hash password
        $hashedPassword = password_hash($data['password'], PASSWORD_BCRYPT);

        // Insert user
        $userId = $userModel->insert([
            'email'      => $data['email'],
            'first_name' => $data['first_name'],
            'last_name'  => $data['last_name'],
            'password'   => $hashedPassword
        ], true);

        // Insert teacher (1:1)
        $teacherModel->insert([
            'user_id'         => $userId,
            'university_name' => $data['university_name'],
            'gender'          => $data['gender'],
            'year_joined'     => $data['year_joined']
        ]);

        return $this->respondCreated(['message' => 'Teacher registered successfully', 'user_id' => $userId]);
    }

    // POST /api/login
    public function login()
    {
        $data = $this->request->getJSON(true);
        $userModel = new UserModel();

        $user = $userModel->where('email', $data['email'])->first();

        if (!$user || !password_verify($data['password'], $user['password'])) {
            return $this->failUnauthorized('Invalid credentials');
        }

        $payload = [
            'id'    => $user['id'],
            'email' => $user['email'],
            'iat'   => time(),
            'exp'   => time() + config('JWT')->expiration
        ];

        $token = JWT::encode($payload, config('JWT')->secret, 'HS256');

        return $this->respond(['token' => $token, 'user' => ['id' => $user['id'], 'email' => $user['email']]]);
    }

    // Protected GET /api/teachers (JOIN both tables)
    public function getTeachers()
    {
        $db = \Config\Database::connect();
        $builder = $db->table('auth_user u');
        $builder->select('u.id, u.email, u.first_name, u.last_name, u.created_at, 
                         t.university_name, t.gender, t.year_joined');
        $builder->join('teachers t', 'u.id = t.user_id');

        $data = $builder->get()->getResultArray();

        return $this->respond($data);
    }
}