<?php
namespace FatFree\Entity\DoctrineOrm;

use Doctrine\ORM\Mapping as ORM;
use FatFree\Helpers\ModelMethodsHelper;

/**
 * @ORM\MappedSuperclass()
 */
abstract class BaseEntity extends ModelMethodsHelper
{
	/**
	 * Default ID filed name from IdentifierTriat
	 */
	const APP_ENUM_DOCTRINEORM_ENTITY_ID = 'id';

	use IdentifierTriat;
	use MapperTriat;
	use SafeDeleteTriat;
	use DatetimeTriat;
}
