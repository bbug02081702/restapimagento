<?php
namespace Taimagento\Training\Model;
// use Magento\Framework\Model\AbstractModel;
use Magento\Framework\Model\AbstractExtensibleModel;
use Taimagento\Training\Api\Data\LearnInterface;
class Learn extends AbstractExtensibleModel implements LearnInterface
{
    /**
     * Define resource model
     */

     
    const ENTITY_ID = 'entity_id';
    const NAME = 'name';
    const GENDER = 'gender';
    const DOB = 'dob';
    const ADDRESS = 'address';
    const SLUG = 'slug';
    const EMAIL = 'email';
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    protected function _construct()
    {
        $this->_init('\Taimagento\Training\Model\ResourceModel\Learn::class');
    }

    /**
     * {@inheritdoc}
     */
    public function getEntityId()
    {
        return $this->getData(self::ENTITY_ID);
    }

    /**
     * {@inheritdoc}
     */
    public function setEntityId($entityId)
    {
        $this->setData(self::ENTITY_ID, $entityId);
        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getName()
    {
        return $this->getData(self::NAME);
    }

    /**
     * {@inheritdoc}
     */
    public function setName($name)
    {
        $this->setData(self::NAME, $name);
        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getGender()
    {
        return $this->getData(self::GENDER);
    }

    /**
     * {@inheritdoc}
     */
    public function setGender($gender)
    {
        $this->setData(self::GENDER, $gender);
        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getDob()
    {
        return $this->getData(self::DOB);
    }

    /**
     * {@inheritdoc}
     */
    public function setDob($dob)
    {
        $this->setData(self::DOB, $dob);
        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getAddress()
    {
        return $this->getData(self::ADDRESS);
    }

    /**
     * {@inheritdoc}
     */
    public function setAddress($address)
    {
        $this->setData(self::ADDRESS, $address);
        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getSlug()
    {
        return $this->getData(self::SLUG);
    }

    /**
     * {@inheritdoc}
     */
    public function setSlug($slug)
    {
        $this->setData(self::SLUG, $slug);
        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getEmail()
    {
        return $this->getData(self::EMAIL);
    }

    /**
     * {@inheritdoc}
     */
    public function setEmail($email)
    {
        $this->setData(self::EMAIL, $email);
        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getCreatedAt()
    {
        return $this->getData(self::CREATED_AT);
    }

    /**
     * {@inheritdoc}
     */
    public function setCreatedAt($createdAt)
    {
        $this->setData(self::CREATED_AT, $createdAt);
        return $this;
    }
}