<?php

namespace ash\Commands;

use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\Player;

class unnick extends Command{

    public function __construct(string $name, string $description = "", string $usageMessage = null, array $aliases = [])
    {
        parent::__construct("unnickname", "reset son pseudo", "/unnickname", ["unnick"]);
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
                    $sender->sendMessage("§4/!\ §fVous avez été unnick");
                }
            }else{
                $sender->sendMessage("§4/!\ §fTu n'as pas la permission d'utiliser cette commande");
            }
        }else{
            $sender->sendMessage("Commande à utiliser en jeu");
        }
    }
}
