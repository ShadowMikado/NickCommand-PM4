<?php


namespace ShadowMikado\Nick;


use pocketmine\event\Listener;
use pocketmine\item\enchantment\KnockbackEnchantment;
use pocketmine\plugin\PluginBase;
use pocketmine\utils\Config;
use ShadowMikado\ChooseSize\Commands\ChooseSize;
use ShadowMikado\Nick\Commands\NickCommand;


class Main extends PluginBase implements Listener
{



    public Config $config;

    /**
     * @var Main
     */

    public static Main $main;

    public function onLoad(): void
    {
        $this->getServer()->getLogger()->info("Starting Nick Plugin...");

    }

    public function onEnable(): void
    {
        $this->getServer()->getLogger()->info("Nick Plugin Started");
        $this->getServer()->getCommandMap()->register("", new NickCommand());
        self::$main = $this;
        $this->saveResource("config.yml");

    }

    public static function getInstance(): Main
    {
        return self::$main;
    }

    public function onDisable(): void
    {
        $this->getServer()->getLogger()->info("Nick Plugin Stopped");
    }
}