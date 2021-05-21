<?php


namespace Neoan3\Components;

use Neoan3\Apps\Hcapture;
use Neoan3\Core\RouteException;
use Neoan3\Frame\Neoan3;
use Neoan3\Model\MessageModel;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;

class Message extends Neoan3
{
    function getMessage($params=[])
    {
        $key = $this->getCredentials('messageKey');
        if(isset($params['key']) && $params['key'] === $key){
            return MessageModel::unread();
        }
        return $params;
    }
}