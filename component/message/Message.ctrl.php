<?php


namespace Neoan3\Components;

use Neoan3\Apps\Db;
use Neoan3\Core\RouteException;
use Neoan3\Frame\Neoan3;
use Neoan3\Model\MessageModel;

class Message extends Neoan3
{



    /**
     * @throws RouteException
     */
    function getMessage($params=[])
    {
        $this->checkMe($params);
        return MessageModel::unread();
    }

    /**
     * @throws RouteException
     */
    function deleteMessage($params)
    {
        $this->checkMe($params);
        return MessageModel::setRead($params['id']);
    }

    /**
     * @throws RouteException
     */
    private function checkMe($params)
    {
        $key = $this->getCredentials('messageKey');
        if(!isset($params['key']) || $params['key'] !== $key){
            throw new RouteException('unauthorized', 401);
        }
    }
}