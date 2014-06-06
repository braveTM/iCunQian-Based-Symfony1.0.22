<?php

/**
 * @package apps\api\modules\Attribute\action
 */

/**
 * Attribute actions.
 *
 * @subpackage Attribute
 * @author     brave <brave.cheng@expacta.com.cn>
 * @version    SVN: $Id: actions.class.php 2692 2006-11-15 21:03:55Z fabien $
 */
class AttributeActions extends baseApiActions
{

    protected $gzip = false;
    protected $since = null;
    protected $responseData = null;
    protected $limit = 100;
    protected $type = null;


    /**
     * Executes index action
     *
     */
    public function preExecute() {
        parent::preExecute();
        $this->setTemplate('json');
    }

    /**
     * execute attribute action
     *
     * @issue 2568
     * @return null
     */
    public function executeAttrbites() {
        if ($this->getRequest()->getMethod() != sfRequest::GET) {
            $this->forward('default', 'error400');
        }
        $this->type = $this->getRequestParameter('type') ? $this->getRequestParameter('type') : null;
        $this->httpCode = apiUtil::CODE_BAD_REQUEST;
        $responseData = array();
        $this->commonGetParameters();
        $this->httpCode = apiUtil::CODE_SUCCESSFUL;
        try {
            $attributes = DepositAttributesPeer::fetchAttributes($this->since, $this->type, $this->limit);
            $lastAttributes = end($attributes['list']);
            $responseData['total_attributes_returned'] = count($attributes['list']);
            $responseData['since'] = strtotime($lastAttributes['update_at']);
            $responseData['total_banks'] = $attributes['total'];
            $responseData['banks'] = $attributes['list'];
        } catch (Exception $e) {
            $responseData['error_msg'] = $e->getMessage();
        }
        $this->responseData = $responseData;
    }

}
