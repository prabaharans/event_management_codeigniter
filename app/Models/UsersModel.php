<?php
declare(strict_types=1);

namespace App\Models;

use CodeIgniter\Model;
use CodeIgniter\Database\Exceptions\DataException;
use CodeIgniter\Entity\Cast\ObjectCast;
use CodeIgniter\Shield\Entities\User as EntitiesUser;
use App\Entities\User as User;
use CodeIgniter\Shield\Models\DatabaseException;
use CodeIgniter\Shield\Models\UserModel as ShieldUserModel;
use Exception;

final class UsersModel extends ShieldUserModel
{
    protected $returnType = User::class;

    protected $table            = 'users';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    // protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [];

    protected bool $allowEmptyInserts = false;
    protected bool $updateOnlyChanged = true;

    protected array $casts = [];
    protected array $castHandlers = [];

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

    /**
     * initialize
     *
     * Class initialisation code, runs after __construct()
     *
     * @return void
     */
    protected function initialize(): void
    {
        parent::initialize();

        $this->allowedFields = [
            ...$this->allowedFields,
            'display_name'
        ];
    }
}
