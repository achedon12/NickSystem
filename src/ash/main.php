<?php

namespace ash;

use ash\Commands\nickname;
use ash\Commands\unnick;
use pocketmine\event\Listener;
use pocketmine\plugin\PluginBase;

class main extends PluginBase implements Listener{

    public function onEnable()
    {
        $this->getLogger()->info("plugin activé");

        $this->getServer()->getCommandMap()->registerAll('Commands',[
           new nickname("nickname","changer de pseudo","/nickname",["nick"]),
           new unnick("unnickname","reset son pseudo","/unnickname",["unnick"])
        ]);
    }
    public function onDisable()
    {
        $this->getLogger()->info("plugin désactivé");
    }
}