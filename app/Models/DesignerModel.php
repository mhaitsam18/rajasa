<?php

namespace App\Models;

use CodeIgniter\Model;

class DesignerModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'designer';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
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
        'no_hp',
        'user_status',
        'last_logout',
        'tipe',
        'avatar',
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

    public function getIndividual($id)
    {
        $db = \Config\Database::connect(); // Connect to the database

        $builder = $db->table('designer'); // Create a query builder for the 'user' table

        $builder->select('*')
            ->where('id', $id);

        $query = $builder->get(); // Execute the query
        $result = $query->getResultArray(); // Get the result as an array

        return $result;
    }

    public function update_status($status)
    {
        $currentSession = session()->get('id'); // Access session data through the session() helper

        if ($currentSession) {
            $data = [
                'user_status' => $status,
            ];

            $this->db->table('designer')
                ->where('id', $currentSession)
                ->update($data);
        }
    }

    public function logoutUser($status, $date)
    {
        $currentSession = session()->get('id'); // Access session data through the session() helper

        if ($currentSession) {
            $data = [
                'user_status' => $status,
                'last_logout' => $date
            ];

            $this->db->table('designer')
                ->where('id', $currentSession)
                ->update($data);
        }
    }
}
