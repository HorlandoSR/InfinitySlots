<?php

namespace InfinitySlots\HaykalPRO;

use pocketmine\event\server\QueryRegenerateEvent;
use pocketmine\event\Listener;
use pocketmine\utils\Config;
use pocketmine\utils\TextFormat;
use pocketmine\plugin\PluginBase;
use InfinitySlots\HaykalPRO\utils\Utils;

class Main extends PluginBase implements Listener{

	public function onEnable(){
		$this->getLogger()->info("§aPlugin InfinitySlots Enable");
        $this->getServer()->getPluginManager()->registerEvents($this,$this);

        @mkdir($this->getDataFolder());
       $this->saveDefaultConfig();
       $this->getResource("config.yml");
	}

	public function onQuery(QueryRegenerateEvent $event){
		$config = new Config($this->getDataFolder() . "config.yml", Config::YAML, array());
	if($config->get("infinity-slots") === true){
        $event->setMaxPlayerCount($event->getPlayerCount() + 1);
	}
}
