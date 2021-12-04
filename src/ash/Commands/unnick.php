<?php

namespace ash\Commands;

use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\lang\Translatable;
use pocketmine\player\Player;

class unnick extends Command{

    public function __construct(string $name, Translatable|string $description = "", Translatable|string|null $usageMessage = null, array $aliases = [])
    {
        parent::__construct($name, $description, $usageMessage, $aliases);
        $this->setPermission("use.unnickname");
    }

    public function execute(CommandSender $sender, string $commandLabel, array $args)
    {
        if($sender instanceof Player){
            if($sender->hasPermission("use.unnickname")){
                if(!empty($args)){
                    $sender->sendMessage("§4/!\ §f/unnick");
                }else{
                    $sender->setNameTag($sender->getName());
                    $sender->setDisplayName($sender->getName());
                    $sender->sendMessage("§4/!\ §fYou have been unnick");
                }
            }else{
                $sender->sendMessage("§4/!\ §fYou don't have this permission to use this command");
            }
        }else{
            $sender->sendMessage("Command to execute in game");
        }
    }
}
