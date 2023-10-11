<?php

namespace App\Models;

use CodeIgniter\Model;

class MessageModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'user_messages';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [];

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

    public function getLastMessage($data)
    {
        $db = \Config\Database::connect(); // Connect to the database
        $session_id = session()->get('id'); // Access session data through the session() helper

        $builder = $db->table('user_messages'); // Create a query builder for the 'user_messages' table

        $builder->select('*')
            ->where("(sender_message_id = '$session_id' AND receiver_message_id = '$data') OR 
                    (sender_message_id = '$data' AND receiver_message_id = '$session_id')")
            ->orderBy('time', 'DESC')
            ->limit(1);

        $query = $builder->get(); // Execute the query
        $result = $query->getResultArray(); // Get the result as an array

        return $result;
    }

    public function getmessage($data)
    {
        $session_id = session()->get('id'); // Access session data through the session() helper

        $builder = $this->db->table('user_messages'); // Create a query builder for the 'user_messages' table

        $builder->select('*')
            ->where("(sender_message_id = '$session_id' AND receiver_message_id = '$data') OR 
                    (sender_message_id = '$data' AND receiver_message_id = '$session_id')");

        $query = $builder->get(); // Execute the query
        $result = $query->getResultArray(); // Get the result as an array

        return $result;
    }

    public function sentMessage($data)
    {
        $this->db->table('user_messages')->insert($data);
    }
}
