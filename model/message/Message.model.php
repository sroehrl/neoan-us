<?php


namespace Neoan3\Model;


use Neoan3\Apps\Db;

class MessageModel extends IndexModel
{
    static function byId($id)
    {

    }

    static function unread()
    {
        return Db::easy('message.*', ['^delete_date','is_read'=>0]);
    }
    static function create($message)
    {
        return Db::ask('message', [
            'subject' => $message['subject'],
            'sent_from' => $message['from'],
            'content' => $message['content']
        ]);
    }
    static function setRead($id)
    {
        return Db::ask('message', ['is_read'=> 1],['id'=>'$' . $id]);
    }

}