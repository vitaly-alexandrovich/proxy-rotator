<?php
namespace ProxyRotator\Responses;

use Modeler\Model;
use Modeler\Property;

/**
 * Class RotatingProxy
 * @package ProxyRotator\Responses
 *
 * @method boolean hasProxy()
 * @method string getProxy()
 * @method boolean hasIp()
 * @method string getIp()
 * @method boolean hasPort()
 * @method integer getPort()
 * @method boolean hasConnectionType()
 * @method string getConnectionType()
 * @method boolean hasAsn()
 * @method string getAsn()
 * @method boolean hasIsp()
 * @method string getIsp()
 * @method boolean hasType()
 * @method string getType()
 * @method boolean hasLastChecked()
 * @method integer getLastChecked()
 * @method boolean hasCity()
 * @method string getCity()
 * @method boolean hasState()
 * @method string getState()
 * @method boolean hasCountry()
 * @method string getCountry()
 * @method boolean hasRandomUserAgent()
 * @method string getRandomUserAgent()
 * @method boolean hasThreadsAllowed()
 * @method integer getThreadsAllowed()
 */
class RotatingProxyResponse extends Model
{
    /**
     * @return array
     */
    protected static function mapProperties()
    {
        return [
            'proxy'             => Property::string()->notNull(),
            'ip'                => Property::string()->notNull(),
            'port'              => Property::integer()->notNull(),
            'connectionType'    => Property::string()->notNull(),
            'asn'               => Property::string()->notNull(),
            'isp'               => Property::string()->notNull(),
            'type'              => Property::string(),
            'lastChecked'       => Property::integer(),
            'get'               => Property::boolean()->notNull()->defaultValue(false),
            'post'              => Property::boolean()->notNull()->defaultValue(false),
            'cookies'           => Property::boolean()->notNull()->defaultValue(false),
            'referer'           => Property::boolean()->notNull()->defaultValue(false),
            'userAgent'         => Property::boolean()->notNull()->defaultValue(false),
            'city'              => Property::string(),
            'state'             => Property::string(),
            'country'           => Property::string(),
            'randomUserAgent'   => Property::string(),
            'threadsAllowed'    => Property::integer(),
        ];
    }

    /**
     * @return boolean
     */
    public function hasAvailableGetRequests()
    {
        return $this->getAttribute('get', false);
    }

    /**
     * @return boolean
     */
    public function hasAvailablePostRequests()
    {
        return $this->getAttribute('post', false);
    }

    /**
     * @return boolean
     */
    public function hasAvailableCookies()
    {
        return $this->getAttribute('cookies', false);
    }

    /**
     * @return boolean
     */
    public function hasAvailableReferer()
    {
        return $this->getAttribute('referer', false);
    }

    /**
     * @return boolean
     */
    public function hasAvailableUserAgent()
    {
        return $this->getAttribute('userAgent', false);
    }
}