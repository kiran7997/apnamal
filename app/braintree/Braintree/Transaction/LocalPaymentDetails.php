<?php
namespace Braintree\Transaction;

use Braintree\Instance;

/**
 * Local payment details from a transaction
 *
 * @package    Braintree
 * @subpackage Transaction
 */

/**
 * creates an instance of LocalPaymentDetails
 *
 *
 * @package    Braintree
 * @subpackage Transaction
 *
 * @property-read string $customField
 * @property-read string $description
 * @property-read string $payerId
 * @property-read string $paymentId
 * @property-read string $fundingSource
 */
class LocalPaymentDetails extends Instance
{
    protected $_attributes = [];

    /**
     * @ignore
     */
    public function __construct($attributes)
    {
        parent::__construct($attributes);
    }
}
class_alias('Braintree\Transaction\LocalPaymentDetails', 'Braintree_Transaction_LocalPaymentDetails');
