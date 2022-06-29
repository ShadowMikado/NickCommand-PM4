<?php


namespace ShadowMikado\Nick;


use pocketmine\event\Listener;
use pocketmine\item\enchantment\KnockbackEnchantment;
use pocketmine\plugin\PluginBase;
use ShadowMikado\ChooseSize\Commands\ChooseSize;
use ShadowMikado\Nick\Commands\NickCommand;


class Main extends PluginBase implements Listener
{
    public function onEnable(): void
    {
        $this->getServer()->getLogger()->info("Nick lancé avec succès");
        $this->getServer()->getCommandMap()->register("", new NickCommand());

    }


    public function onDisable(): void
    {
        $this->getServer()->getLogger()->info("Nick arrété avec succès");
    }
}