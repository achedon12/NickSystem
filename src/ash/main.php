<?php

namespace ash;

use ash\Commands\nickname;
use ash\Commands\unnick;
use pocketmine\event\Listener;
use pocketmine\plugin\PluginBase;

class main extends PluginBase implements Listener{

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