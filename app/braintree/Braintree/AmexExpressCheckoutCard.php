<?php
namespace Braintree;

/**
 * Braintree AmexExpressCheckoutCard module
 * Creates and manages Braintree Amex Express Checkout cards
 *
 * <b>== More information ==</b>
 *
 * See {@link https://developers.braintreepayments.com/javascript+php}<br />
 *
 * @package    Braintree
 * @category   Resources
 *
 * @property-read string $bin
 * @property-read string $cardMemberExpiryDate
 * @property-read string $cardMemberNumber
 * @property-read string $cardType
 * @property-read \DateTime $createdAt
 * @property-read string $customerId
 * @property-read boolean $default
 * @property-read string $expirationMonth
 * @property-read string $expirationYear
 * @property-read string $imageUrl
 * @property-read string $token
 * @property-read string $sourceDescription
 * @property-read \Braintree\Subscription[] $subscriptions
 * @property-read \DateTime $updatedAt
 */
class AmexExpressCheckoutCard extends Base
{
    /* instance methods */
    /**
     * returns false if default is null or false
     *
     * @return boolean
     */
    public function isDefault()
    {
        return $this->default;
    }

    /**
     *  factory method: returns an instance of AmexExpressCheckoutCard
     *  to the requesting method, with populated properties
     *
     * @ignore
     * @return AmexExpressCheckoutCard
     */
    public static function factory($attributes)
    {

        $instance = new self();
        $instance->_initialize($attributes);
        return $instance;
    }

    /**
     * sets instance properties from an array of values
     *
     * @access protected
     * @param array $amexExpressCheckoutCardAttribs array of Amex Express Checkout card properties
     * @return void
     */
    protected function _initialize($amexExpressCheckoutCardAttribs)
    {
        // set the attributes
        $this->_attributes = $amexExpressCheckoutCardAttribs;

        $subscriptionArray = [];
        if (isset($amexExpressCheckoutCardAttribs['subscriptions'])) {
            foreach ($amexExpressCheckoutCardAttribs['subscriptions'] AS $subscription) {
                $subscriptionArray[] = Subscription::factory($subscription);
            }
        }

        $this->_set('subscriptions', $subscriptionArray);
    }
}
class_alias('Braintree\AmexExpressCheckoutCard', 'Braintree_AmexExpressCheckoutCard');
