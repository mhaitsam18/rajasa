<?php

namespace App\Models;

use CodeIgniter\Model;

class CustomerModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'customer';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = false;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'id',
        'email',
        'password',
        'nama',
        'username',
        'alamat',
        'kode_pos',
        'no_hp',
        'avatar',
        'tipe'
    ];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];

    public function logoutUser($status, $date)
    {
        $currentSession = session()->get('id'); // Access session data through the session() helper

        if ($currentSession) {
            $data = [
                'user_status' => $status,
                'last_logout' => $date
            ];

            $this->db->table('customer')
                ->where('id', $currentSession)
                ->update($data);
        }
    }

    public function update_status($status)
    {
        $currentSession = session()->get('id'); // Access session data through the session() helper

        if ($currentSession) {
            $data = [
                'user_status' => $status,
            ];

            $this->db->table('customer')
                ->where('id', $currentSession)
                ->update($data);
        }
    }


    public function getIndividual($id)
    {
        $db = \Config\Database::connect(); // Connect to the database

        $builder = $db->table('customer'); // Create a query builder for the 'user' table

        $builder->select('*')
            ->where('id', $id);

        $query = $builder->get(); // Execute the query
        $result = $query->getResultArray(); // Get the result as an array

        return $result;
    }
}