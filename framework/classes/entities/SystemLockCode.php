<?php
namespace CASHMusic\Entities;


use Doctrine\ORM\Mapping as ORM;

/**
 * SystemLockCodes
 *
 * @Table(name="system_lock_codes", indexes={@Index(name="system_lock_codes_uid", columns={"uid"}), @Index(name="system_lock_codes_user_id", columns={"user_id"})})
 * @Entity
 */
class SystemLockCode extends EntityBase
{

    protected $fillable = ['uid', 'scope_table_alias', 'scope_table_id', 'user_id', 'claim_date'];
    /**
     * @var string
     *
     * @Column(name="uid", type="string", length=255, nullable=true)
     */
    protected $uid;

    /**
     * @var string
     *
     * @Column(name="scope_table_alias", type="string", length=255, nullable=true)
     */
    protected $scope_table_alias = 'elements';

    /**
     * @var integer
     *
     * @Column(name="scope_table_id", type="integer", nullable=true)
     */
    protected $scope_table_id;

    /**
     * @var integer
     *
     * @Column(name="user_id", type="integer", nullable=true)
     */
    protected $user_id;

    /**
     * @var integer
     *
     * @Column(name="claim_date", type="integer", nullable=true)
     */
    protected $claim_date;

    /**
     * @var integer
     *
     * @Column(name="creation_date", type="integer", nullable=true, options={"default": "UNIX_TIMESTAMP()"})
     */
    protected $creation_date = '0';

    /**
     * @var integer
     *
     * @Column(name="modification_date", type="integer", nullable=true, options={"default": "UNIX_TIMESTAMP()"})
     */
    protected $modification_date;

    /** @Id @Column(type="integer") @GeneratedValue(strategy="AUTO") **/
    protected $id;

    public function metadata($conditions=false) {
        return $this->hasManyPolymorphic("SystemMetadata", "id", "assets");
    }
}
