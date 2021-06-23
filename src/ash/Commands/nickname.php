<?php

namespace ash\Commands;

use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\Player;

class nickname extends Command{

    public function __construct(string $name, string $description = "", string $usageMessage = null, array $aliases = [])
    {
        parent::__construct("nickname", "changer de pseudo", "/nickname", ["nick"]);
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
                    $sender->sendMessage("§4/!\ §fVous avez été nick en §c{$args[0]}");
                }
            }else{
                $sender->sendMessage("§4/!\ §fTu n'as pas la permission d'utiliser cette commande");
            }
        }else{
            $sender->sendMessage("Commande à utiliser en jeu");
        }
    }
}
