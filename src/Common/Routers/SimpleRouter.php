<?php
/**
 * File name: SimpleRouter.php
 *
 * Project: Project2
 *
 * PHP version 5
 *
 * $LastChangedDate$
 * $LastChangedBy$
 */

namespace Common\Routers;

use Common\Http\IRequest;


/**
 * Class SimpleRouter
 */
class SimpleRouter implements IRouter
{
    /**
     * @var array $uri
     * @access protected
     */
    protected $uriMappings;
    protected $config;

    /**
     * @param array $newUriMappings Is an associative array holding URI mappings
     */
    public function __construct($config = [])
    {
        $this->config = $config;

        if (empty($this->config['app']['uri-mappings'])) {
            throw new \InvalidArgumentException(
                __METHOD__.': $uriMappings cannot be empty'
            );
        }

        $this->uriMappings = $this->config['app']['uri-mappings'];
    }

    /**
     * Function handle Process the URI to Controller mapping
     *
     * @param IRequest $request
     * @throws \HttpUrlException
     *
     * @access public
     */
    public function handle(IRequest $request)
    {
        $uri = $request->getUri();

        if (!array_key_exists($uri, $this->uriMappings)) {
            throw new \HttpUrlException(
                __METHOD__.': '.$uri.' is not mapped'
            );
        }

        /**
         * @var \Controllers\Controller $controller
         */
        $controller = new $this->uriMappings[$uri];

        $controller->setConfiguration($this->config);

        $controller->setRequest($request);

        $controller->action();
    }
}
