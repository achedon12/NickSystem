<?php

namespace achedon12\nicksystem;

use achedon12\nicksystem\Commands\nickname;
use achedon12\nicksystem\Commands\unnick;
use pocketmine\event\Listener;
use pocketmine\permission\Permission;
use pocketmine\permission\PermissionManager;
use pocketmine\plugin\PluginBase;

class nick extends PluginBase implements Listener{

    private static nick $instance;

    protected function onEnable() : void{

        $this->getServer()->getCommandMap()->registerAll('Commands',[
           new nickname("nickname","Change your pseudo","/nickname",["nick"]),
           new unnick("unnickname","Reset your pseudo","/unnickname",["unnick"])
        ]);

        self::$instance = $this;

        PermissionManager::getInstance()->addPermission(new Permission("use.nickname","nickname permission"));
        PermissionManager::getInstance()->addPermission(new Permission("use.unnickname","unnickname permission"));
    }
    

    public static function getInstance(): self
    {
        return self::$instance;
    }

}