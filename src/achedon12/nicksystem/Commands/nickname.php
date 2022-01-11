<?php

namespace achedon12\nicksystem\Commands;

use achedon12\nicksystem\nick;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\lang\Translatable;
use pocketmine\player\Player;
use pocketmine\plugin\Plugin;
use pocketmine\plugin\PluginOwned;

class nickname extends Command implements PluginOwned {

    public function __construct(string $name, Translatable|string $description = "", Translatable|string|null $usageMessage = null, array $aliases = [])
    {
        parent::__construct($name, $description, $usageMessage, $aliases);
        $this->setPermission("use.nickname");
    }

    public function execute(CommandSender $sender, string $commandLabel, array $args)
    {
        if($sender instanceof Player){
            if($sender->hasPermission("use.nickname")){
                if(count($args) > 1 || empty($args)){
                    $sender->sendMessage("§4/!\ §f/nick <pseudo>");
                }else{
                    $sender->setNameTag($args[0]);
                    $sender->setDisplayName($args[0]);
                    $sender->sendMessage("§4/!\ §fYour new pseudo is §c{$args[0]}");
                }
            }else{
                $sender->sendMessage("§4/!\ §fYou don't have this permission to use this command");
            }
        }else{
            $sender->sendMessage("Command to execute in game");
        }
    }

    public function getOwningPlugin() : Plugin{
        return nick::getInstance();
    }
}
