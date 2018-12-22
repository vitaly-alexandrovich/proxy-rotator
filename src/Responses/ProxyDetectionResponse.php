<?php
namespace ProxyRotator\Responses;

use Modeler\Model;
use Modeler\Property;

/**
 * Class ProxyDetectionResponse
 * @package ProxyRotator\Responses
 *
 * @method boolean hasStatus()
 * @method string getStatus()
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
 * @method boolean hasGet()
 * @method boolean getGet()
 * @method boolean hasPost()
 * @method boolean getPost()
 * @method boolean hasCookies()
 * @method boolean getCookies()
 * @method boolean hasReferer()
 * @method boolean getReferer()
 * @method boolean hasUserAgent()
 * @method boolean getUserAgent()
 * @method boolean hasCity()
 * @method string getCity()
 * @method boolean hasState()
 * @method string getState()
 * @method boolean hasCountry()
 * @method string getCountry()
 * @method boolean hasCurrentThreads()
 * @method integer getCurrentThreads()
 * @method boolean hasThreadsAllowed()
 * @method integer getThreadsAllowed()
 */
class ProxyDetectionResponse extends Model
{
    /**
     * @return array
     */
    protected static function mapProperties()
    {
        return [
            'status'            => Property::string()->notNull(),
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
            'currentThreads'    => Property::integer(),
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