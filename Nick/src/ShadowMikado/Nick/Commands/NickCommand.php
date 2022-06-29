<?php

namespace ShadowMikado\Nick\Commands;

use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\player\Player;

class NickCommand extends Command {

    public function __construct()
    {
        parent::__construct("nick", "", "/nick");
        $this->setPermission("nick.cmd");
    }
    public function execute(CommandSender $sender, string $commandLabel, array $args)
    {
        if($sender instanceof Player) {
            if($sender->hasPermission("nick.cmd")) {
                if (isset($args[0])) {
                    if($args[0] === "reset") {
                        $reset = $sender->getName();
                        $sender->setDisplayName($reset);
                        $sender->setNameTag($reset);
                        $sender->sendMessage("§aVous avez réinitialisé votre pseudo (§b" . $sender->getDisplayName() . "§a) !");

                    } else {

                        $sender->setDisplayName($args[0]);
                        $sender->setNameTag($args[0]);
                        $sender->sendMessage("§aVous vous appelez maintenant §b" . $sender->getDisplayName() . "§a !");
                    }

                }
            } else {
                $sender->sendMessage("§cVous n'avez pas la permission d'éxecuter cette commande");
            }
        }
    }
}