<?php

namespace ShadowMikado\Nick\Commands;

use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\player\Player;
use pocketmine\utils\Config;
use ShadowMikado\Nick\Main;

class NickCommand extends Command {

    public function __construct()
    {
        parent::__construct("nick", "", "/nick");
        $this->setPermission("nick.cmd");
    }
    public function execute(CommandSender $sender, string $commandLabel, array $args)
    {
        $cfg = new Config(Main::getInstance()->getDataFolder() . "config.yml", Config::YAML);
        if($sender instanceof Player) {
            if($sender->hasPermission("nick.cmd")) {
                if (isset($args[0])) {
                    if($args[0] === "reset") {
                        $reset = $sender->getName();
                        $replaced = str_replace("{name}", $sender->getName(),$cfg->get("Reset Message"));
                        $sender->setDisplayName($reset);
                        $sender->setNameTag($reset);
                        $sender->sendMessage($replaced);

                    } else {

                        $replaced2 = str_replace("{name}", $sender->getDisplayName(),$cfg->get("Nick Message"));
                        $sender->setDisplayName($args[0]);
                        $sender->setNameTag($args[0]);
                        $sender->sendMessage($replaced2);
                    }

                } else {
                    $sender->sendMessage($cfg->get("Error Message"));
                }
            } else {
                $sender->sendMessage($cfg->get("No Permission Message"));
            }
        }
    }
}