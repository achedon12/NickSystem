<?php

namespace achedon12\nicksystem;

use achedon12\nicksystem\Commands\nickname;
use achedon12\nicksystem\Commands\unnick;
use pocketmine\event\Listener;
use pocketmine\plugin\PluginBase;

class nick extends PluginBase implements Listener{

    protected function onEnable() : void{
        $this->getLogger()->info("plugin enable");

        $this->getServer()->getCommandMap()->registerAll('Commands',[
           new nickname("nickname","Change your pseudo","/nickname",["nick"]),
           new unnick("unnickname","Reset your pseudo","/unnickname",["unnick"])
        ]);
    }
    public function onDisable() : void{
        $this->getLogger()->info("plugin disable");
    }
}